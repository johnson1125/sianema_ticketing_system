<?php

namespace App\Http\Controllers;

use DateTime;
use DOMDocument;
use Carbon\Carbon;
use XSLTProcessor;
use App\Models\Hall;
use App\Models\Seat;
use App\Models\Movie;
use App\Models\MovieSeat;
use App\Models\HallTimeSlot;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Services\HallTimeSlotService;
use App\Services\XMLExtensionsService;
use function PHPUnit\Framework\isNull;

class HallTimeSlotController extends Controller
{

    protected $hallTimeSlotService;

    public function __construct(HallTimeSlotService $hallTimeSlotService)
    {
        $this->hallTimeSlotService = $hallTimeSlotService;
    }


    public function index($date)
    {
        $defaultDate = $date;
        $timeSlotDate = strtotime($date);
        $today = strtotime(date('Y-m-d'));
        $addBtnStatus = ($timeSlotDate >= $today ? "enable" : "disable");
        $halls = Hall::all();
        $hallTimeSlots = $this->hallTimeSlotService->getHallTimeSlots($date);
        $hallTimeSlots = $this->hallTimeSlotService->addTimeSlotName($hallTimeSlots);
        return view('/admin/hallTimeSlot.index', compact('halls', 'hallTimeSlots', 'defaultDate', 'addBtnStatus'));
    }



    public function getDate(Request $request)
    {
        $date = $request->input('date');
        return redirect()->route('hallTimeSlot', ['date' => $date]);
    }


    //TODO
    //Pass in Movie Data
    public function create($hallID, $date, $activeTab)
    {
        $hall = Hall::getWithID($hallID);
        $maintenanceTabStatus = "Enable";
        $hallTimeSlots =  HallTImeSLot::getWithStartDateAndHallID($date, $hallID);

        try {
            $hallTimeSlots = $this->hallTimeSlotService->addTimeSlotName($hallTimeSlots);
        } catch (\RuntimeException $e) {
            // Redirect back with an error message
            $maintenanceTabStatus = "Disable";
            $activeTab = "movie";
        }


        $onScreenMovies = Movie::getOnScreenMovies();

        //Pass in onscreen movie (Selection)
        $movies =  $onScreenMovies;

        //Get maintenance record from webservice through API
        $maintenancesResponse = Http::get('http://127.0.0.1:5001/api/maintenances?hallType=' . $hall->hall_type);
        // dd($maintenancesResponse->json());

        //Pass in maintainence activities available for the hall (Selection)
        $maintenanceOption = $maintenancesResponse->json();

        return view('/admin/hallTimeSlot.create', compact('hall', 'movies', 'maintenanceOption', 'date', 'activeTab', 'hallTimeSlots', 'maintenanceTabStatus'));
    }

    //TODO
    //Store movie
    //Create movieSeat
    //Add maintenance record
    public function store(Request $request, $hallID, $date, $hallTimeSlotType)
    {
        $movieID = $request->input('movie');
        $maintenanceID = $request->input('maintenance');

        if ($hallTimeSlotType == 'Maintenance') {
            $startTime = $request->input('maintenanceStartTime');
            $maintenancesResponse = Http::get('http://127.0.0.1:5001/api/maintenances?maintenanceID=' . $maintenanceID);
            if ($maintenancesResponse) {
                $maintenanceData = $maintenancesResponse->json();
                $duration = $maintenanceData[0]['duration'];
            }
        } else {
            $startTime = $request->input('movieStartTime');
            $movie = Movie::getMovieAttributesWithID($movieID, ['movie_duration']);
            $duration = $movie["movie_duration"];
        }

        $timeSlots = HallTimeSlot::whereDate('startDateTime', '=', Carbon::createFromFormat('d-m-Y', $date)->format('Y-m-d'))
            ->where('hall_id', $hallID)->get();
        if ($timeSlots) {
            $result = $this->isTimeSlotAvailable($date, $startTime,  $duration, $timeSlots);
            if ($result != 'Valid') {
                return redirect()->back()
                    ->with('errorMsg', ($result != "Invalid") ? "End time over 2AM." : "TimeSlot Time clashed.")
                    ->with('activeTab', $hallTimeSlotType)
                    ->withInput();
            }
        }
        $hallTimeSlotDate = DateTime::createFromFormat('d-m-Y', $date);
        $dateTimeString = $date . ' ' . $startTime;
        $dateTime = DateTime::createFromFormat('d-m-Y H:i A', $dateTimeString);
        $formatedDateTime = $dateTime->format('Y-m-d H:i:s');
        $hallTimeSLotID = $this->generateHallTimeSlotID($hallID, $hallTimeSlotDate, $startTime);

        if ($hallTimeSlotType == 'Maintenance') {

            HallTimeSlot::create([
                'hall_time_slot_id' => $hallTimeSLotID,
                'startDateTime' => $formatedDateTime,
                'duration' => $duration,
                'timeSlotType' => $hallTimeSlotType,
                'hall_id' => $hallID,
                'movie_id' => null,
                'maintenance_id' => $maintenanceID
            ]);

            //Add maintenance record through webservice api and return new maintenance record id 
            $addMaintenanceRecordResponse = Http::post('http://127.0.0.1:5001/api/maintenance-record', ['startTime' => $formatedDateTime, 'hallID' => $hallID, 'maintenanceID' => $maintenanceID]);
            // Check if the request was successful
            if ($addMaintenanceRecordResponse->successful()) {
                // Process the response

                $responseData = $addMaintenanceRecordResponse->json();
            } else {
                // Handle the error
                abort(500, 'Error sending data to Maitenance Web Service');
            }
        } else {
            HallTimeSlot::create([
                'hall_time_slot_id' => $hallTimeSLotID,
                'startDateTime' => $formatedDateTime,
                'duration' => $duration,
                'timeSlotType' => $hallTimeSlotType,
                'hall_id' => $hallID,
                'movie_id' => $movieID,
                'maintenance_id' => null
            ]);

            $seats = Seat::where('hall_id', $hallID)->get();
            $movieSeats = $seats->map(function ($seat) use ($hallTimeSLotID) {
                return [
                    'movie_seat_id' => $hallTimeSLotID . '-' . $seat->row_letter . str_pad($seat->column_number, 2, '0', STR_PAD_LEFT),
                    'ticket_transaction_id' => null,
                    'hall_time_slot_id' => $hallTimeSLotID,
                    'seat_id' => $seat->seat_id,
                    'movie_seats_status' => 'Available'
                ];
            })->toArray();

            MovieSeat::insert($movieSeats);
        }

        return redirect()->route('hallTimeSlot', ['date' => $date])->with('message', 'Hall timeSlot added sucessfully.');
    }


    public function show($hallTimeSlotID)
    {
        $movie = [];
        $maintenance = "";
        $hallTimeSlot = HallTimeSlot::findOrFail($hallTimeSlotID);
        $startDateTime = new DateTime($hallTimeSlot->startDateTime);
        $today = new DateTime();
        $deleteBtnStatus = ($startDateTime >= $today ? "enable" : "disable");
        $date = (new DateTime($hallTimeSlot->startDateTime))->format('d-m-Y');

        if ($hallTimeSlot->timeSlotType == "Movie") {
            $movie = Movie::findOrFail($hallTimeSlot->movie_id);
        } else {
            try {
                $response = Http::get('http://127.0.0.1:5001/api/maintenances?maintenanceID=' . $hallTimeSlot->maintenance_id);
                if ($response->successful()) {
                    XMLExtensionsService::convertJsonToXMLFile($response, 'maintenances', 'xml/maintenanceDetails.xml');
                    //Convert xml to html
                    $maintenance = XMLExtensionsService::XMLFileToHTML('xml/maintenanceDetails.xml', 'xsl/maintenanceDetails.xsl');
                }
            } catch (\Exception $e) {
                return redirect()->route('hallTimeSlot', ['date' => $date]);
            }
        }

        return view('/admin/hallTimeSlot.show', compact('hallTimeSlot', "maintenance", "movie","deleteBtnStatus","date"));
    }


    public function showMovieDetails($hallID, $date, $movieID)
    {
        $movie = Movie::findOrFail($movieID);
        return view('/admin/hallTimeSlot.movieDetails', compact('movie', 'hallID', 'date'));
    }

    public function showMaintenanceDetails($hallID, $date, $maintenanceID)
    {

        try {
            $response = Http::get('http://127.0.0.1:5001/api/maintenances?maintenanceID=' . $maintenanceID);
            if ($response->successful()) {
                XMLExtensionsService::convertJsonToXMLFile($response, 'maintenances', 'xml/maintenanceDetails.xml');
                //Convert xml to html
                $maintenanceData = XMLExtensionsService::XMLFileToHTML('xml/maintenanceDetails.xml', 'xsl/maintenanceDetails.xsl');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('activeTab', 'Maintenance');
        }


        return view('/admin/hallTimeSlot.maintenanceDetails', compact('maintenanceData', 'hallID', 'date'));
    }



    public function destroy($hallTimeSlotID)
    {
        $hallTimeSlot = HallTimeSlot::findOrFail($hallTimeSlotID);
        $date = $date = new DateTime($hallTimeSlot->startDateTime);
        $formatedDate = $date->format('d-m-Y');

        if ($hallTimeSlot->timeSlotType == "Movie") {
            $movieSeats = MovieSeat::where('hall_time_slot_id', $hallTimeSlot->hall_time_slot_id)->get();
            $soldSeat = $movieSeats->contains(function ($movieSeat) {
                return $movieSeat->movie_seats_status == 'Sold';
            });
            if ($soldSeat) {
                return redirect()->route('hallTimeSlot.index', ['date' => $formatedDate])
                    ->with('message', 'Hall TimeSlot ( ' . $hallTimeSlotID . ' ) cannot be deleted.');
            }
            foreach ($movieSeats as $movieSeat) {
                $movieSeat->delete();
            }
        } else {
            //Add maintenance record through webservice api and return new maintenance record id 
            $deleteMaintenanceRecordResponse = Http::post('http://127.0.0.1:5001/api/remove-maintenance-record', ['maintenanceID' => $hallTimeSlot->maintenance_id, 'startDateTime' => $hallTimeSlot->startDateTime, 'hallID' => $hallTimeSlot->hall_id]);
        }

        $hallTimeSlot->delete();
        flash('Your message here')->success(); 
        return redirect()->route('hallTimeSlot', ['date' => $formatedDate])->with('message', 'Hall TimeSlot ( ' . $hallTimeSlotID . ' ) deleted sucessfully.');
    }

    public function getHallTimeSlotData()
    {
        // $hallTimeSlots = HallTimeSlot::whereDate('startDateTime',$date)->get();
        $hallTimeSlots = HallTimeSlot::all();
        return response()->json($hallTimeSlots);
    }

    public function getMaintenanceData($maintenanceID)
    {
        $response = Http::get('http://127.0.0.1:5001/api/maintenances?maintenanceID=' . $maintenanceID);
        return response()->json($response->json());
    }

    public function getMovieData($movieID)
    {
        $movie = Movie::getMovieAttributesWithID($movieID, ["movie_id", "movie_poster", "movie_duration"]);
        return response()->json($movie);
    }

    public function getSpecifiicHallTimeSlotData($hallID, $date)
    {
        $hallTimeSlots =  HallTimeSlot::whereDate('startDateTime', '=', Carbon::createFromFormat('d-m-Y', $date)->format('Y-m-d'))
            ->where('Hall_ID', $hallID)->get();
        return response()->json($hallTimeSlots);
    }

    //TODO
    //Apply design pattern 
    function isTimeSlotAvailable($date, $startTime, $duration, $timeSlots)
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


        // Check for overlap with existing time slots
        foreach ($timeSlots as $slot) {
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
        }

        return 'Valid'; // No overlap and within the time limit
    }


    private function generateHallTimeSlotID($hallID, $date, $startTime)
    {
        $time = DateTime::createFromFormat('h:i A', $startTime);
        $startTime = $time->format('H:i');
        list($hours, $minutes) = explode(':', $startTime);
        $formateddate = $date->format('ymd');
        $hallTimeSlotID = $hallID . '-' . $formateddate . '-' . $hours . '-' . $minutes;
        return $hallTimeSlotID;
    }
}
