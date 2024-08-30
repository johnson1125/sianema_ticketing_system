<?php

namespace App\Http\Controllers;

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
    /**
     * Display a listing of the resource.
     */
    public function index($date)
    {
        $halls = Hall::all();
        $hallTimeSlots =  HallTimeSlot::whereDate('startDateTime', '=', Carbon::createFromFormat('d-m-Y', $date)->format('Y-m-d'))->get();
        $defaultDate = $date;

        return view('/admin/hallTimeSlot.index', compact('halls', 'hallTimeSlots', 'defaultDate'));
    }



    public function getDate(Request $request)
    {
        $date = $request->input('date');
        return redirect()->route('hallTimeSlot', ['date' => $date]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($hallID, $date)
    {
        $hall = Hall::where('Hall_ID', $hallID);

        $hallTimeSlots =  HallTimeSlot::whereDate('startDateTime', '=', Carbon::createFromFormat('d-m-Y', $date)->format('Y-m-d'))
            ->where('Hall_ID', $hallID)->get();

        //Get Data of onscreen movie

        //Get maintenance record from webservice through API
        $response = Http::get('http://127.0.0.1:5001/api/maintenances?hallType=Large');
        dd($response->json());

        //Add maintenance record through webservice api and return new maintenance record id 
        $addMaintenanceRecordResponse = Http::post('http://127.0.0.1:5001/api/maintenance-record', ['startTime' => '2024-08-25 12:00:00', 'hallID' => 'HALL-01','maintenanceID' => 'MTN-C-DP-001']);
        // Check if the request was successful
        if ($addMaintenanceRecordResponse->successful()) {
            // Process the response
            
            $responseData = $addMaintenanceRecordResponse->json();
            // dd($responseData);
        } else {
            // Handle the error
            abort(500, 'Error sending data to Flask API');
        }

        $response1 = Http::get('http://127.0.0.1:5001/api/maintenance-records');
        // dd($response1->json());

        //Convert json to xml
        //Pass Json and xml root element as
        $xml = XMLextensionsController::convertJsonToXMLString($response, 'users');

        //Convert xml to html
        $users = XMLExtensionsController::XMLStringToHTML($xml, 'xsl/userDetails.xsl');

        //Pass in onscreen movie (Selection)
        $movies = [
            ['code' => 'US', 'name' => 'United States'],
            ['code' => 'CA', 'name' => 'Canada'],
            ['code' => 'FR', 'name' => 'France'],
            ['code' => 'DE', 'name' => 'Germany']
        ];

        //Pass in maintainence activities available for the hall (Selection)
        $maintenance = [
            ['code' => 'US', 'name' => 'United States'],
            ['code' => 'CA', 'name' => 'Canada'],
            ['code' => 'FR', 'name' => 'France'],
            ['code' => 'DE', 'name' => 'Germany']
        ];

        return view('/admin/hallTimeSlot.create', compact('hall', 'movies', 'users', 'maintenance'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validation 
        //Check TimeSlot availabiility
        $startTime = $request->input('startTime');
        $movieID = $request->input('movies');
        return redirect()->back()->with('message', 'Form submitted successfully!')->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(HallTimeSlot $hallTimeSlot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HallTimeSlot $hallTimeSlot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HallTimeSlot $hallTimeSlot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
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

    public function getSpecifiicHallTimeSlotData($hallID, $date)
    {
        $hallTimeSlots =  HallTimeSlot::whereDate('startDateTime', '=', Carbon::createFromFormat('d-m-Y', $date)->format('Y-m-d'))
            ->where('Hall_ID', $hallID)->get();
        return response()->json($hallTimeSlots);
    }
}
