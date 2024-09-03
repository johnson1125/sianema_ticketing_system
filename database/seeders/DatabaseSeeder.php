<?php

namespace Database\Seeders;

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
            HallTimeSlotsTableSeeder::class,
            UsersTableSeeder::class,
            
          
            //Test Data
            // HallsTableTestDataSeeder::class,
            // MoviesTableTestDataSeeder::class,
            // HallTimeSlotsTableTestDataSeeder::class

            //HallTimeSlot Test Data
            // HallTimeSlotDataSeeder::class
        ]);

    
    }
}
