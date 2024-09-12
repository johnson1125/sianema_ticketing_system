<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HallTimeSlotsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = database_path('sql/hallTimeSlots.sql');
        $sql = file_get_contents($path);

        // Execute the SQL dump
        DB::unprepared($sql);
    }
}
