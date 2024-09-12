<?php

namespace App\Services;

use DateTime;
use Exception;
use Carbon\Carbon;
use App\Models\Hall;
use App\Models\Seat;
use App\Models\Movie;
use App\Models\MovieSeat;
use App\Models\HallTimeSlot;
use App\Iterators\TimeSlotIterator;
use Illuminate\Support\Facades\Http;

class HallTimeSlotService
{
    public function getHallTimeSlots($date)
    {
        $hallTimeSlots =  HallTimeSlot::getWithStartDate($date);
        return $hallTimeSlots;
    }


    public function prepareIndexViewData($date)
    {
        $defaultDate = $date;
        $timeSlotDate = strtotime($date);
        $today = strtotime(date('Y-m-d'));
        $addBtnStatus = ($timeSlotDate >= $today ? "enable" : "disable");
        $halls = Hall::all();
        $hallTimeSlots = $this->getHallTimeSlots($date);
        $hallTimeSlots = $this->addTimeSlotName($hallTimeSlots);
        return compact('halls', 'hallTimeSlots', 'defaultDate', 'addBtnStatus');
    }

    public function prepareCreateViewData($hallID, $date, $activeTab)
    {

        $hall = Hall::getWithID($hallID);
        $maintenanceTabStatus = "Enable";
        $hallTimeSlots =  HallTImeSLot::getWithStartDateAndHallID($date, $hallID);
        $hallTimeSlots = $this->addTimeSlotName($hallTimeSlots);

        $onScreenMovies = Movie::getOnScreenMovies();

        //Pass in onscreen movie (Selection)
        $movies =  $onScreenMovies;

        //Get maintenance record from webservice through API
        try {
            $maintenancesResponse = Http::get('http://127.0.0.1:5001/api/maintenances?hallType=' . $hall->hall_type);
            //Pass in maintainence activities available for the hall (Selection)
            $maintenanceOption = $maintenancesResponse->json();
        } catch (\Exception $e) {
            $maintenanceOption = [];
            $maintenanceTabStatus = "Disable";
            $activeTab = "movie";
        }

        // Return data as an array for the view
        return compact('hall', 'movies', 'maintenanceOption', 'date', 'hallTimeSlots', 'activeTab', 'maintenanceTabStatus');
    }

    public function createTimeSlot($movieID, $maintenanceID, $movieStartTime, $maintenanceStarTime, $hallID, $date, $hallTimeSlotType)
    {
        // Determine start time and duration based on time slot type
        if ($hallTimeSlotType == 'Maintenance') {
            $startTime = $maintenanceStarTime;
            $duration = $this->getMaintenanceDuration($maintenanceID);
        } else {
            $startTime = $movieStartTime;
            $duration = $this->getMovieDuration($movieID);
        }

        // Check for time slot conflicts
        $timeSlots = HallTimeSlot::whereDate('startDateTime', '=', Carbon::createFromFormat('d-m-Y', $date)->format('Y-m-d'))
            ->where('hall_id', $hallID)
            ->get();

        if ($timeSlots) {
            $result = $this->isTimeSlotAvailable($date, $startTime,  $duration, $timeSlots);
            if ($result != 'Valid') {
                return [
                    'status' => 'error',
                    'message' => ($result != "Invalid") ? "End time over 2AM." : "TimeSlot Time clashed.",
                    'activeTab' => $hallTimeSlotType
                ];
            }
        }


        $hallTimeSlotID = $this->generateHallTimeSlotID($hallID, $date, $startTime);
        $formattedDateTime = $this->formatDateTime($date, $startTime);

        if ($hallTimeSlotType == 'Maintenance') {
            $this->createMaintenanceTimeSlot($hallID, $hallTimeSlotID, $formattedDateTime, $duration, $maintenanceID);
        } else {
            $this->createMovieTimeSlot($hallID, $hallTimeSlotID, $formattedDateTime, $duration, $movieID);
        }

        return ['status' => 'success', 'message' => 'Hall time slot added successfully.'];
    }

    private function getMaintenanceDuration($maintenanceID)
    {
        $response = Http::get('http://127.0.0.1:5001/api/maintenances?maintenanceID=' . $maintenanceID);
        if ($response) {
            $maintenanceData = $response->json();
            return $maintenanceData[0]['duration'];
        }
        return null;
    }

    private function getMovieDuration($movieID)
    {
        $movie = Movie::getMovieAttributesWithID($movieID, ['movie_duration']);
        return $movie['movie_duration'];
    }

    private function formatDateTime($date, $startTime)
    {
        $dateTimeString = $date . ' ' . $startTime;
        $dateTime = DateTime::createFromFormat('d-m-Y H:i A', $dateTimeString);
        return $dateTime->format('Y-m-d H:i:s');
    }

    private function generateHallTimeSlotID($hallID, $date, $startTime)
    {
        $date = DateTime::createFromFormat('d-m-Y', $date);
        $time = DateTime::createFromFormat('h:i A', $startTime);
        $startTime = $time->format('H:i');
        list($hours, $minutes) = explode(':', $startTime);
        $formateddate = $date->format('ymd');
        $hallTimeSlotID = $hallID . '-' . $formateddate . '-' . $hours . '-' . $minutes;
        return $hallTimeSlotID;
    }

    private function createMaintenanceTimeSlot($hallID, $hallTimeSlotID, $formattedDateTime, $duration, $maintenanceID)
    {
        HallTimeSlot::create([
            'hall_time_slot_id' => $hallTimeSlotID,
            'startDateTime' => $formattedDateTime,
            'duration' => $duration,
            'timeSlotType' => 'Maintenance',
            'hall_id' => $hallID,
            'movie_id' => null,
            'maintenance_id' => $maintenanceID
        ]);

        // Add maintenance record through API
        $response = Http::post('http://127.0.0.1:5001/api/maintenance-record', [
            'startTime' => $formattedDateTime,
            'hallID' => $hallID,
            'maintenanceID' => $maintenanceID
        ]);

        if (!$response->successful()) {
            abort(500, 'Error sending data to Maintenance Web Service');
        }
    }

    private function createMovieTimeSlot($hallID, $hallTimeSlotID, $formattedDateTime, $duration, $movieID)
    {
        HallTimeSlot::create([
            'hall_time_slot_id' => $hallTimeSlotID,
            'startDateTime' => $formattedDateTime,
            'duration' => $duration,
            'timeSlotType' => 'Movie',
            'hall_id' => $hallID,
            'movie_id' => $movieID,
            'maintenance_id' => null
        ]);

        $seats = Seat::where('hall_id', $hallID)->get();
        $movieSeats = $seats->map(function ($seat) use ($hallTimeSlotID) {
            return [
                'movie_seat_id' => $hallTimeSlotID . '-' . $seat->row_letter . str_pad($seat->column_number, 2, '0', STR_PAD_LEFT),
                'ticket_transaction_id' => null,
                'hall_time_slot_id' => $hallTimeSlotID,
                'seat_id' => $seat->seat_id,
                'movie_seats_status' => 'Available'
            ];
        })->toArray();

        MovieSeat::insert($movieSeats);
    }

    public function isTimeSlotAvailable($date, $startTime, $duration, $timeSlots)
    {
        // Convert start time to DateTime object
        $dateTimeSting = $date . ' ' . $startTime;

        $startDateTime = DateTime::createFromFormat('d-m-Y h:i A', $dateTimeSting);

        // Convert duration to minutes
        list($hours, $minutes) = explode(':', $duration);
        list($hours, $minutes) = explode(':', $duration);
        $totalDurationMinutes = ($hours * 60) + $minutes;

        // Create DateTime objects for 12:00 AM and 2:00 AM of the same day
        $midnight = (clone $startDateTime)->setTime(0, 0);
        $twoAM = (clone $startDateTime)->setTime(2, 0);

        // Check if the start time falls between 12:00 AM and 2:00 AM
        if ($startDateTime >= $midnight && $startDateTime < $twoAM) {
            // Add 1 day to the start time
            $startDateTime->modify('+1 day');
        }

        // Calculate end time by adding the duration in minutes
        $endDateTime = clone $startDateTime;
        $endDateTime->modify("+$totalDurationMinutes minutes");

        // Convert 2 AM to DateTime object
        $LimitEndTimeSting = $date . ' ' . '02:00';
        $limitEndTime = DateTime::createFromFormat('d-m-Y h:i', $LimitEndTimeSting);
        $limitEndTime->modify('+1 day'); // Move to the next day since 2 AM is after midnight

        // Check if the end time is beyond 2 AM
        if ($endDateTime > $limitEndTime) {
            return 'InvalidEndTime'; // End time exceeds 2 AM
        }


        // Create an instance of TimeSlotIterator
        $iterator = new TimeSlotIterator($timeSlots->toArray());
        $iterator->rewind();

        // Check for overlap with existing time slots using the iterator
        while ($iterator->valid()) {
            $slot = $iterator->current();
            $slotStartDateTime = DateTime::createFromFormat('Y-m-d H:i:s', $slot['startDateTime']);

            // Convert slot duration to minutes
            list($slotHours, $slotMinutes) = explode(':', $slot['duration']);
            $slotDurationMinutes = ($slotHours * 60) + $slotMinutes;

            $slotEndDateTime = clone $slotStartDateTime;
            $slotEndDateTime->modify("+$slotDurationMinutes minutes");

            // Check for overlap
            if (($startDateTime < $slotEndDateTime && $endDateTime > $slotStartDateTime)) {
                return 'Invalid'; // Overlap detected
            }

            $iterator->next();
        }

        return 'Valid'; // No overlap and within the time limit
    }


    public function prepareShowViewData($hallTimeSlotID)
    {
        $hallTimeSlot = HallTimeSlot::findOrFail($hallTimeSlotID);
        $startDateTime = new DateTime($hallTimeSlot->startDateTime);
        $today = new DateTime();
        $deleteBtnStatus = ($startDateTime >= $today ? "enable" : "disable");
        $date = $startDateTime->format('d-m-Y');

        $movie = [];
        $maintenance = "";

        if ($hallTimeSlot->timeSlotType == "Movie") {
            $movie = Movie::findOrFail($hallTimeSlot->movie_id);
        } else {
            try {
                $response = Http::get('http://127.0.0.1:5001/api/maintenances?maintenanceID=' . $hallTimeSlot->maintenance_id);
                if ($response->successful()) {
                    XMLExtensionsService::convertJsonToXMLFile($response, 'maintenances', 'xml/maintenanceDetails.xml');
                    $maintenance = XMLExtensionsService::XMLFileToHTML('xml/maintenanceDetails.xml', 'xsl/maintenanceDetails.xsl');
                }
            } catch (Exception $e) {
                // Handle the exception or log it
                return redirect()->route('hallTimeSlot', ['date' => $date]);
            }
        }
        return compact('hallTimeSlot', 'movie', 'maintenance', 'deleteBtnStatus', 'date');
    }



    public function deleteHallTimeSlot($hallTimeSlotID)
    {
        $hallTimeSlot = HallTimeSlot::findOrFail($hallTimeSlotID);
        $date = new DateTime($hallTimeSlot->startDateTime);
        $formatedDate = $date->format('d-m-Y');

        if ($hallTimeSlot->timeSlotType == "Movie") {
            $movieSeats = MovieSeat::where('hall_time_slot_id', $hallTimeSlot->hall_time_slot_id)->get();
            $soldSeat = $movieSeats->contains(function ($movieSeat) {
                return $movieSeat->movie_seats_status == 'Sold';
            });
            if ($soldSeat) {
                return [
                    'redirect' => route('hallTimeSlot.index', ['date' => $formatedDate]),
                    'message' => 'Hall TimeSlot ( ' . $hallTimeSlotID . ' ) cannot be deleted.',
                ];
            }
            foreach ($movieSeats as $movieSeat) {
                $movieSeat->delete();
            }
        } else {
            // Add maintenance record through webservice API
            try {
                Http::post('http://127.0.0.1:5001/api/remove-maintenance-record', [
                    'maintenanceID' => $hallTimeSlot->maintenance_id,
                    'startDateTime' => $hallTimeSlot->startDateTime,
                    'hallID' => $hallTimeSlot->hall_id,
                ]);
            } catch (Exception $e) {
                // Handle exceptions or log them
            }
        }

        $hallTimeSlot->delete();

        return [
            'redirect' => route('hallTimeSlot', ['date' => $formatedDate]),
            'message' => 'Hall TimeSlot ( ' . $hallTimeSlotID . ' ) deleted successfully.',
        ];
    }

    public function addTimeSlotName($hallTimeSlots)
    {
        $hallTimeSlots = $hallTimeSlots->map(function ($hallTimeSlot) {
            if ($hallTimeSlot->maintenance_id != null) {
                $name = 'Maintenance';
                try {
                    $maintenancesResponse = Http::get('http://127.0.0.1:5001/api/maintenances?maintenanceID=' . $hallTimeSlot->maintenance_id);



                    if (!$maintenancesResponse->failed()) {
                        $maintenanceData = $maintenancesResponse->json();

                        if (!empty($maintenanceData) && isset($maintenanceData[0]['name'])) {
                            $name = $maintenanceData[0]['name'];
                        }
                    }
                } catch (\Exception $e) {
                    $name = 'Maintenance';
                }
            } else {
                //Get Movie Name
                $movie = Movie::getMovieAttributesWithID($hallTimeSlot->movie_id, ["movie_name"]);
                $name = $movie["movie_name"];
            }
            $hallTimeSlot->timeSlotName = $name;

            return $hallTimeSlot;
        });

        return $hallTimeSlots;
    }
}
