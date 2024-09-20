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
use Exception;

use function PHPUnit\Framework\isNull;

// Author: Ong Cheng Leong
class HallTimeSlotController extends Controller
{

    protected $hallTimeSlotService;

    public function __construct(HallTimeSlotService $hallTimeSlotService)
    {
        $this->hallTimeSlotService = $hallTimeSlotService;
    }


    public function index($date)
    {
        $data = $this->hallTimeSlotService->prepareIndexViewData($date);
        return view('/admin/hallTimeSlot.index', compact('data'));
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
        $data = $this->hallTimeSlotService->prepareCreateViewData($hallID, $date, $activeTab);

        return view('/admin/hallTimeSlot.create', compact('data'));
    }

    //TODO
    //Store movie
    //Create movieSeat
    //Add maintenance record
    public function store(Request $request, $hallID, $date, $hallTimeSlotType)
    {
        $movieID = $request->input('movie');
        $maintenanceID = $request->input('maintenance');
        $maintenanceStarTime = $request->input('maintenanceStartTime');
        $movieStartTime = $request->input('movieStartTime');

        $result = $this->hallTimeSlotService->createTimeSlot($movieID, $maintenanceID, $movieStartTime, $maintenanceStarTime, $hallID, $date, $hallTimeSlotType);

        if ($result['status'] == 'error') {
            return redirect()->back()
                ->with('errorMsg', $result['message'])
                ->with('activeTab', $result['activeTab'])
                ->withInput();
        }

        return redirect()->route('hallTimeSlot', ['date' => $date])->with('message', $result['message'])->with('messageType', "Success");
    }


    public function show($hallTimeSlotID)
    {

        $data = $this->hallTimeSlotService->prepareShowViewData($hallTimeSlotID);

        if (isset($data['redirect'])) {
            return $data['redirect'];
        }

        return view('/admin/hallTimeSlot.show', compact('data'));
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
        $result = $this->hallTimeSlotService->deleteHallTimeSlot($hallTimeSlotID);

        if (isset($result['redirect'])) {
            return redirect($result['redirect'])->with('message', $result['message'])->with('messageType', $result['messageType']);
        }

        return redirect()->route('hallTimeSlot.index')->with('message', 'An error occurred while trying to delete the Hall TimeSlot.')->with('messageType', "Error");
    }

    public function getHallTimeSlotData($date, $hallID)
    {
        if ($hallID != "") {
            $hallTimeSlots = HallTimeSlot::getWithStartDateAndHallID($date, $hallID);
        } else {
            $hallTimeSlots = HallTimeSlot::getWithStartDate($date);
        }


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
}
