<?php

namespace App\Http\Controllers;

use DOMDocument;
use Carbon\Carbon;
use XSLTProcessor;
use App\Models\Hall;
use App\Models\HallTimeSlot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HallTimeSlotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $date = date('d-m-Y');
        return redirect()->route('hallTimeSlot.indexWithDate',['date' => $date]);
    }

    public function indexWithDate($date)
    {
        $halls = Hall::all();
        $hallTimeSlots =  HallTimeSlot::whereDate('startDateTime', '=',Carbon::createFromFormat('d-m-Y', $date)->format('Y-m-d'))->get();
        $defaultDate = $date;
        //testing api
        // $response = Http::get('http://127.0.0.1:5000/api/users');
        // echo $response;
        return view('/admin/hallTimeSlot.index', compact('halls', 'hallTimeSlots','defaultDate'));
    }

    public function getDate(Request $request){
        $date = $request->input('date');
        return redirect()->route('hallTimeSlot.indexWithDate',['date' => $date]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($hallID, $date)
    {
        $hall = Hall::where('Hall_ID', $hallID);
        $xml = new DOMDocument();
        $xml->load(resource_path('xml/books.xml'));

        $xslDoc = new DOMDocument();
        $xslDoc->load(resource_path('xsl/books.xsl'));

        $processor = new XSLTProcessor();
        $processor->importStylesheet($xslDoc);

        $result = $processor->transformToXml($xml);

        $countries = [
            ['code' => 'US', 'name' => 'United States'],
            ['code' => 'CA', 'name' => 'Canada'],
            ['code' => 'FR', 'name' => 'France'],
            ['code' => 'DE', 'name' => 'Germany']
        ];
        return view('/admin/hallTimeSlot.create', compact('hall', 'result','countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
}
