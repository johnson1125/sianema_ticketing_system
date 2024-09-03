<?php
namespace App\Http\Controllers;

use App\Factory\HallFactory\HallConcreteProductCreator\StandardHallFactory;
use App\Factory\HallFactory\HallConcreteProductCreator\PremiumHallFactory;
use App\Factory\HallFactory\HallConcreteProductCreator\FamilyHallFactory;
use App\Factory\HallFactory\HallConcreteProduct\StandardHall;
use App\Factory\HallFactory\HallConcreteProduct\PremiumHall;
use App\Factory\HallFactory\HallConcreteProduct\FamilyHall;
use App\Factory\HallFactory\SeatCreator;
use App\Models\Hall;
use App\Models\Seat;

use Illuminate\Http\Request;

class HallController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $halls = Hall::all();
        return view('admin.manageHall.index', compact('halls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {  
   
        $halls = Hall::all();    
        return view('admin.manageHall.create', compact('halls'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'hallType' => 'required|string',
            'hallId' => 'required|string',
            'hallName' => 'required|string',
        ]);

        $hallId = $request->input('hallId');
        $hallName = $request->input('hallName');

        $hall = new Hall();
        $hall->hall_id = $hallId;
        $hall->hall_name = $hallName;
        $hall->hall_type = $request->input('hallType');
        $hall->status = "open";
    
        if ($hall->save()) {
            $hallFactory = null;
            switch ($hall->hall_type) {
                case 'Standard':
                    $hallFactory = new StandardHallFactory();
                    break;
                case 'Premium':
                    $hallFactory = new PremiumHallFactory();
                    break;
                case 'Family':
                    $hallFactory = new FamilyHallFactory();
                    break;
                default:
                    break;
            }
            $seatCreator = new SeatCreator();
            $tempHall = $hallFactory->createHall($hallId, $hallName, $seatCreator);
            $tempHall->createSeats();

            return redirect()->route('manage.hall.index')->with('success', 'Hall created successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to create hall!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   
        $hall = Hall::find($id);
        $seats = Seat::where('hall_id', $id)->get();
        return view('admin.manageHall.edit', compact('seats', 'hall'));
    }

    

    /**
     * Update the specified resource in storage.
     */
    /**
 * Update the specified resource in storage.
 */
public function update(Request $request, string $hall_id)
{
    $hall = Hall::find($hall_id);
    if ($hall) {
        $hall->status = $hall->status === 'open' ? 'closed' : 'open';
        if ($hall->save()) {
            return redirect()->back()->with('success', 'Hall status updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to update hall status!');
        }
    } else {
        return redirect()->back()->with('error', 'Hall not found!');
    }
}
    
    public function destroy(string $id)
    {
        //
    }

    public function getHallInfo($hallType)
{
    $hallCount = Hall::where('hall_type', $hallType)->count();

    $hallID = "HALL(" . substr($hallType, 0, 1) . ")-" . sprintf('%02d', ($hallCount + 1));
    $hallName = $hallType . " Hall " . sprintf('%02d', ($hallCount + 1));

    $seatCreator = new SeatCreator();
    $hallFactory = null;
    switch ($hallType) {
        case 'Standard':
            $hallFactory = new StandardHallFactory();
            break;
        case 'Premium':
            $hallFactory = new PremiumHallFactory();
            break;
        case 'Family':
            $hallFactory = new FamilyHallFactory();
            break;
        
        default:
            break;
    }

    
    $hall = $hallFactory->createHall($hallID, $hallName, $seatCreator);

    $numberOfSeats = $hall->getColumns() * $hall->getRows();

    return response()->json([
        'hall_id' => $hallID,
        'hall_name' => $hallName,
        'number_of_seats' => $numberOfSeats,
        'hall_image' => $hallType . '_hall.png',
    ]);
}


public function updateSeat(Request $request,string $hall_id)
{
    
}
}
