<?php
namespace App\Http\Controllers;

use App\Factory\HallFactory\HallConcreteProductCreator\StandardHallFactory;
use App\Factory\HallFactory\HallConcreteProductCreator\PremiumHallFactory;
use App\Factory\HallFactory\HallConcreteProductCreator\FamilyHallFactory;
use App\Factory\HallFactory\HallConcreteProduct\StandardHall;
use App\Factory\HallFactory\HallConcreteProduct\PremiumHall;
use App\Factory\HallFactory\HallConcreteProduct\FamilyHall;
use App\Services\SeatService;
use App\Models\Hall;
use App\Models\Seat;

use App\Services\HallService;

use Illuminate\Http\Request;

class HallController extends Controller
{
    protected $hallService;
    protected $seatService;

    public function __construct(HallService $hallService, SeatService $seatService)
    {
        $this->hallService = $hallService;
        $this->seatService = $seatService;
    }

 

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
    

    public function store(Request $request)
    {
        $validated = $request->validate([
            'hallType' => 'required|string',
            'hallId' => 'required|string',
            'hallName' => 'required|string',
        ]);
  
        if ($this->hallService->createHall($validated)){
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
public function update(string $hall_id)
{
    
    if ($this->hallService->updateHallStatus($hall_id)) {     
        return redirect()->back()->with('success', 'Hall status updated successfully!');
    } 

    return redirect()->back()->with('error', 'Failed to update hall status!');
}
    
    public function destroy(string $id)
    {
        //
    }

    public function getHallInfo($hallType)
        {
            $hallCount = Hall::where('hall_type', $hallType)->count();

            $hallID = "HALL-" . substr($hallType, 0, 1) . "-" . sprintf('%02d', ($hallCount + 1));
            $hallName = $hallType . " Hall " . sprintf('%02d', ($hallCount + 1));


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

    
        $hall = $hallFactory->createHall($hallID, $hallName, $this->seatService);

        $numberOfSeats = $hall->getColumns() * $hall->getRows();

        return response()->json([
            'hall_id' => $hallID,
            'hall_name' => $hallName,
            'number_of_seats' => $numberOfSeats,
            'hall_image' => $hallType . '_hall.png',
        ]);
    }


    public function updateSeatStatus(Request $request, string $hall_id)
    {
        $seatStatuses = json_decode($request->input('seat_statuses'), true);

        if (is_array($seatStatuses)) {
            try {
                $this->seatService->updateSeatStatuses($seatStatuses);
                return redirect()->back()->with('success', 'Seat statuses updated successfully.');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Failed to update seat statuses: ' . $e->getMessage());
            }
        } 
        return redirect()->back()->with('error', 'Invalid seat statuses'); 
    }
}
