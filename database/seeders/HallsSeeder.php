<?php

namespace Database\Seeders;
use App\Models\Hall;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HallsSeeder extends Seeder
{
    public function run()
	{
		$path = database_path('sql/halls.sql');
        $sql = file_get_contents($path);

        // Execute the SQL dump
        DB::unprepared($sql);
	}
}
