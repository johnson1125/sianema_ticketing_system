<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use App\Models\HallTimeSlot;
use Illuminate\Http\Request;

class HallTimeSlotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $halls= Hall::all();
        // echo $halls;
        $hallTimeSlots =  HallTimeSlot::all();
        // echo $hallTimeSlots;
        return view('/admin/hallTimeSlot.index', compact('halls','hallTimeSlots'));

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    
    public function getHallTimeSlotData(){
        // $hallTimeSlots = HallTimeSlot::whereDate('startDateTime',$date)->get();
        $hallTimeSlots = HallTimeSlot::all();
        return response()->json($hallTimeSlots);  
    }
}
