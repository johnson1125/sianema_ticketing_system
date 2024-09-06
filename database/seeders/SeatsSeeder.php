<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
