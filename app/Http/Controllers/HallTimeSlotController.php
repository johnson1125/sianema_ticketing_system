<?php

namespace App\Http\Controllers;

use DateTime;
use DOMDocument;
use Carbon\Carbon;
use XSLTProcessor;
use App\Models\Hall;
use App\Models\HallTimeSlot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\XMLToHTMLController;

class HallTimeSlotController extends Controller
{

    public function index($date)
    {
        $halls = Hall::all();
        $hallTimeSlots =  HallTimeSlot::whereDate('startDateTime', '=', Carbon::createFromFormat('d-m-Y', $date)->format('Y-m-d'))->get();
        $hallTimeSlots = $this->addTimeSlotName($hallTimeSlots);
        $defaultDate = $date;

        return view('/admin/hallTimeSlot.index', compact('halls', 'hallTimeSlots', 'defaultDate'));
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
        $hall = Hall::where('hall_id', $hallID)->first();

        $hallTimeSlots =  HallTimeSlot::whereDate('startDateTime', '=', Carbon::createFromFormat('d-m-Y', $date)->format('Y-m-d'))
            ->where('hall_id', $hallID)->get();

        $hallTimeSlots = $this->addTimeSlotName($hallTimeSlots);

        //Get Data of onscreen movie



        //Add maintenance record through webservice api and return new maintenance record id 
        $addMaintenanceRecordResponse = Http::post('http://127.0.0.1:5001/api/maintenance-record', ['startTime' => '2024-08-25 12:00:00', 'hallID' => 'HALL-01', 'maintenanceID' => 'MTN-C-DP-001']);
        // Check if the request was successful
        if ($addMaintenanceRecordResponse->successful()) {
            // Process the response

            $responseData = $addMaintenanceRecordResponse->json();
            // dd($responseData);
        } else {
            // Handle the error
            abort(500, 'Error sending data to Maitenance Web Service');
        }

        $response = Http::get('http://127.0.0.1:5001/api/users');

        //Convert json to xml
        //Pass Json and xml root element as
        $xml = XMLextensionsController::convertJsonToXMLString($response, 'users');
        dd($xml);

        //Convert xml to html
        $users = XMLExtensionsController::XMLStringToHTML($xml, 'xsl/userDetails.xsl');

        //Pass in onscreen movie (Selection)
        $movies = [
            ['code' => 'US', 'name' => 'United States'],
            ['code' => 'CA', 'name' => 'Canada'],
            ['code' => 'FR', 'name' => 'France'],
            ['code' => 'DE', 'name' => 'Germany']
        ];
        //Get maintenance record from webservice through API
        $maintenancesResponse = Http::get('http://127.0.0.1:5001/api/maintenances?hallType=Large');
        // dd($maintenancesResponse->json());

        //Pass in maintainence activities available for the hall (Selection)
        $maintenanceOption = $maintenancesResponse->json();

        return view('/admin/hallTimeSlot.create', compact('hall', 'movies', 'users', 'maintenanceOption', 'date', 'activeTab', 'hallTimeSlots'));
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
            $duration = $request->input('movieDuraton');
        }

        $timeSlots = HallTimeSlot::whereDate('startDateTime', '=', Carbon::createFromFormat('d-m-Y', $date)->format('Y-m-d'))
           ->where('hall_id', $hallID)->get();
        if ($timeSlots) {
            $result = $this->isTimeSlotAvailable($date, $startTime, $duration, $timeSlots);
            if ($result != 'Valid') {
                return redirect()->back()
                    ->with('errorMsg', ($result != "Invalid") ? "End Time over 2AM" : "Invalid Time Slot")
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
        } else {
            HallTimeSlot::create([
                'hallTimeSlot_id' => $hallTimeSLotID,
                'startDateTime' => $formatedDateTime,
                'duration' => $duration,
                'timeSlotType' => $hallTimeSlotType,
                'hall_id' => $hallID,
                'movieID' => $movieID,
                'maintenanceID' => null
            ]);
        }

        return redirect()->route('hallTimeSlot', ['date' => $date])->with('message', 'Hall Time Slot Added Sucessfully');
    }

    /**
     * Display the specified resource.
     */
    //TODO
    //Show Hall Time Slot 
    //Based on hallTimeSlot ID return different view 
    public function show(HallTimeSlot $hallTimeSlot)
    {
        //
    }


    //TODO
    //Show Movie Details
    //Based on movie ID 
    public function showMovieDetails(){}

    public function showMaintenanceDetails($hallID, $date, $maintenanceID)
    {
        $response = Http::get('http://127.0.0.1:5001/api/maintenances?maintenanceID=' . $maintenanceID);
        $xml = XMLextensionsController::convertJsonToXMLString($response, 'maintenances');
        dd($xml);
        //Convert xml to html
        $maintenanceData = XMLExtensionsController::XMLStringToHTML($xml, 'xsl/maintenanceDetails.xsl');
        // dd($maintenanceData);
        return view('/admin/hallTimeSlot.maintenanceDetails', compact('maintenanceData', 'hallID', 'date'));
    }

   //TODO
   //Edit hallTimeSlot
    public function edit(HallTimeSlot $hallTimeSlot)
    {
        //
    }

   //TODO
   //Based on the modiification 
   //Do the relevant update
   //Update hallTImeSLot
   //Update movieSeat
    public function update(Request $request, HallTimeSlot $hallTimeSlot)
    {
        //
    }

   //No Delete
    public function destroy(HallTimeSlot $hallTimeSlot)
    {
        //
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
        $time = DateTime::createFromFormat('H:i A', $startTime);
        $startTime = $time->format('h:i');
        list($hours, $minutes) = explode(':', $startTime);
        $formateddate = $date->format('ymd');
        $hallTimeSlotID = $hallID . '-' . $formateddate . '-' . $hours . '-' . $minutes;
        return $hallTimeSlotID;
    }

    private function addTimeSlotName($hallTimeSlots)
    {
        $hallTimeSlots = $hallTimeSlots->map(function ($hallTimeSlot) {
            if ($hallTimeSlot->maintenance_id != null) {
                $maintenancesResponse = Http::get('http://127.0.0.1:5001/api/maintenances?maintenanceID=' . $hallTimeSlot->maintenance_id);

                $name = 'Maintenance';

                if (!$maintenancesResponse->failed()) {
                    $maintenanceData = $maintenancesResponse->json();

                    if (!empty($maintenanceData) && isset($maintenanceData[0]['name'])) {
                        $name = $maintenanceData[0]['name'];
                    }
                }
            } else {
                //Get Movie Name
                $name = 'Movie';
            }
            $hallTimeSlot->timeSlotName = $name;

            return $hallTimeSlot;
        });

        return $hallTimeSlots;
    }
}
