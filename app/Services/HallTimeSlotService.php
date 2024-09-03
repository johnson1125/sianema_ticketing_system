<?php

namespace App\Services;

use App\Models\HallTimeSlot;
use App\Models\Movie;
use App\Models\MovieSeat;
use Illuminate\Support\Facades\DB;

class HallTimeSlotService
{
    /**
     * Create a new booking and update movie schedule.
     *
     * @param array $data
     * @return Booking
     * @throws \Exception
     */

    public function getHallTimeSlots(array $data)
    {

        //return lists of hall time Slots 
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
