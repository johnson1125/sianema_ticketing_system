<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MoviesSeeder extends Seeder
{
	/**
	 * Run the database seeders.
	 *
	 * @return void
	 */
	public function run()
	{
		$path = database_path('sql/movies.sql');
        $sql = file_get_contents($path);

        // Execute the SQL dump
        DB::unprepared($sql);
	}
}
