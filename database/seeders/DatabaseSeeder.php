<?php

namespace Database\Seeders;

use App\Models\HallTimeSlot;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            UsersTableSeeder::class,
    
            //Test Data
            // HallsTableTestDataSeeder::class,
            // MoviesTableTestDataSeeder::class,
            // HallTimeSlotsTableTestDataSeeder::class

            //HallTimeSlot Test Data
            // HallTimeSlotDataSeeder::class

            //Movie Test Data
            MoviesSeeder::class,

            //Hall Test Data
            HallsSeeder::class,

            //Seat Test Data 
            SeatsSeeder::class,

            //Hall TimeSlot Test Data
            HallTimeSlotsSeeder::class,

            //MovieSeat Test Data
            MovieSeatsSeeder::class,
            
        ]);

    
    }
}
