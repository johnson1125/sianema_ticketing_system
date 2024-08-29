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
        $response = Http::get('http://127.0.0.1:5001/api/users');

        //Convert json to xml
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

    public function getSpecifiicHallTimeSlotData($hall_ID,$date)
    {
        $hallTimeSlots =  HallTimeSlot::whereDate('startDateTime', '=', Carbon::createFromFormat('d-m-Y', $date)->format('Y-m-d'))
            ->where('Hall_ID', $hallID)->get();
        return response()->json($hallTimeSlots);
    }

    public function convertJsonToXML($json, $parentElement)
    {
        $data = json_decode($json, true);
        $xmlHeader = '<?xml version="1.0"?><' . $parentElement . '></' . $parentElement . '>';
        $xmlData = new \SimpleXMLElement($xmlHeader);
        $this->arrayToXml($data, $xmlData, $parentElement);

        return $xmlData;
    }

    private function arrayToXml($data, $xmlData, $parentElement)
    {
        $element = substr($parentElement, 0, -1);
        // Ensure $data is an array before proceeding
        if (!is_array($data)) {
            // If $data is not an array, handle it by adding it directly as an XML element
            $xmlData->addChild($element, htmlspecialchars("$data"));
            return;
        }

        foreach ($data as $key => $value) {
            // Handle numeric keys for sequential data (arrays)
            if (is_numeric($key)) {
                $key = $element;
            }

            if (is_array($value)) {
                // Check if the value is an associative array (object-like) or an indexed array (list-like)
                if ($this->isAssoc($value)) {
                    // Handle associative array (object-like)
                    $subnode = $xmlData->addChild("$key");
                    $this->arrayToXml($value, $subnode, $key);
                } else {
                    // Handle indexed array (list-like)
                    $subnode = $xmlData->addChild("$key");
                    foreach ($value as $item) {
                        $this->arrayToXml($item, $subnode, $key);
                    }
                }
            } else {
                // Add scalar values as XML elements
                $xmlData->addChild("$key", htmlspecialchars("$value"));
            }
        }
    }

    // Helper function to check if an array is associative (i.e., an object)
    private function isAssoc(array $arr)
    {
        if (empty($arr)) return false; // An empty array is not associative
        return array_keys($arr) !== range(0, count($arr) - 1);
    }
}
