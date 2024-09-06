<?php

namespace Database\Seeders;
use App\Models\Hall;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HallsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
	{
		DB::table('halls')->insert([
			'hall_id' => "HALL(F)-01",
			'created_at' => "2024-09-02 03:18:38",
			'updated_at' => "2024-09-05 03:54:20",
			'hall_name' => "Family Hall 01",
			'hall_type' => "Family",
			'status' => "closed",
		]);

		DB::table('halls')->insert([
			'hall_id' => "HALL(F)-02",
			'created_at' => "2024-09-02 03:21:43",
			'updated_at' => "2024-09-04 01:59:07",
			'hall_name' => "Family Hall 02",
			'hall_type' => "Family",
			'status' => "open",
		]);

		DB::table('halls')->insert([
			'hall_id' => "HALL(P)-01",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-03 22:26:10",
			'hall_name' => "Premium Hall 01",
			'hall_type' => "Premium",
			'status' => "open",
		]);

		DB::table('halls')->insert([
			'hall_id' => "HALL(P)-02",
			'created_at' => "2024-09-04 16:03:39",
			'updated_at' => "2024-09-04 16:03:39",
			'hall_name' => "Premium Hall 02",
			'hall_type' => "Premium",
			'status' => "open",
		]);

		DB::table('halls')->insert([
			'hall_id' => "HALL(P)-03",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_name' => "Premium Hall 03",
			'hall_type' => "Premium",
			'status' => "open",
		]);

		DB::table('halls')->insert([
			'hall_id' => "HALL(S)-01",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_name' => "Standard Hall 01",
			'hall_type' => "Standard",
			'status' => "open",
		]);

		DB::table('halls')->insert([
			'hall_id' => "HALL(S)-02",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_name' => "Standard Hall 02",
			'hall_type' => "Standard",
			'status' => "open",
		]);
	}
}
