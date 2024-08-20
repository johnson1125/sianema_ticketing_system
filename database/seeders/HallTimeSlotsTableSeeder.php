<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HallTimeSlotsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('hall_time_slots')->upsert([
        //     [
        //         'id'=>'',
        //         'startDateTime' => Carbon::now()->addDays(1), // Tomorrow
        //         'duration' => '02:00:00', // 2 hours
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //         'timeSlotType' => 'movie',
        //     ],
        //     [   
        //         'id'=>'2',
        //         'startDateTime' => Carbon::now()->addDays(2), // Day after tomorrow
        //         'duration' => '03:00:00', // 3 hours
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //         'movieID' => 'mov002',
        //         'timeSlotType' => 'movie',
        //     ],
        //     [
        //         'id'=>'3',
        //         'startDateTime' => Carbon::now()->addDays(3), // Three days from now
        //         'duration' => '01:30:00', // 1 hour 30 minutes
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //         'movieID' => 'mov003',
        //         'timeSlotType' => 'movie',
        //     ],
        // ],['id']);
    }
}
