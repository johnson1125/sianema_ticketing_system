<?php

namespace App\Services;

use App\Models\Hall;
use App\Models\Movie;
use App\Models\MovieSeat;
use App\Models\HallTimeSlot;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class HallTimeSlotService
{
    /**
     * Create a new booking and update movie schedule.
     *
     * @param array $data
     * @return Booking
     * @throws \Exception
     */

    public function getHallTimeSlots($date)
    {
       
        $hallTimeSlots =  HallTimeSlot::getWithStartDate($date);
        return $hallTimeSlots;
    }


    public function createHallTimeSlot(array $data)
    {

        //return status 
    }



    public function storeHallTimeSlot(array $data)
    {

        //return status
    }


    public function updateHallTimeSlot(array $data)
    {

        //return status
    }



    public function deleteHallTimeSlot(array $data)
    {

        //return status
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
                    throw new \RuntimeException('Failed to fetch maintenance data: ' . $e->getMessage());
                }


              
            } else {
                //Get Movie Name
                $movie = Movie::getMovieAttributesWithID($hallTimeSlot->movie_id,["movie_name"]);
                $name = $movie["movie_name"];
            }
            $hallTimeSlot->timeSlotName = $name;

            return $hallTimeSlot;
        });

        return $hallTimeSlots;
    }


    // /**
    //  * Update the movie schedule's available seats.
    //  *
    //  * @param int $movieScheduleId
    //  * @param int $ticketsBooked
    //  * @return void
    //  * @throws \Exception
    //  */
    // protected function updateMovieSchedule(int $movieScheduleId, int $ticketsBooked): void
    // {
    //     $schedule = MovieSchedule::find($movieScheduleId);

    //     if (!$schedule) {
    //         throw new \Exception('Movie Schedule not found.');
    //     }

    //     if ($schedule->available_seats < $ticketsBooked) {
    //         throw new \Exception('Not enough available seats.');
    //     }

    //     $schedule->available_seats -= $ticketsBooked;
    //     $schedule->save();
    // }
}
