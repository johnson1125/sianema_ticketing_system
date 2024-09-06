<?php

namespace Database\Seeders;
use App\Models\Seat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeatsSeeder extends Seeder
{
    public function run()
	{
		$path = database_path('sql/seats.sql');
        $sql = file_get_contents($path);

        // Execute the SQL dump
        DB::unprepared($sql);
	}
}
