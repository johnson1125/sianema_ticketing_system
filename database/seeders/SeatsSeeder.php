<?php

namespace Database\Seeders;
use App\Models\Seat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;F&rbrack;-01-A01",
			'created_at' => "2024-09-02 03:18:38",
			'updated_at' => "2024-09-04 16:04:14",
			'hall_id' => "HALL&lbrack;F&rbrack;-01",
			'row_letter' => "A",
			'column_number' => "1",
			'seat_type' => "Family",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;F&rbrack;-01-B01",
			'created_at' => "2024-09-02 03:18:38",
			'updated_at' => "2024-09-05 03:54:10",
			'hall_id' => "HALL&lbrack;F&rbrack;-01",
			'row_letter' => "B",
			'column_number' => "1",
			'seat_type' => "Family",
			'status' => "occupied",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;F&rbrack;-01-C01",
			'created_at' => "2024-09-02 03:18:38",
			'updated_at' => "2024-09-04 16:04:30",
			'hall_id' => "HALL&lbrack;F&rbrack;-01",
			'row_letter' => "C",
			'column_number' => "1",
			'seat_type' => "Family",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;F&rbrack;-01-D01",
			'created_at' => "2024-09-02 03:18:38",
			'updated_at' => "2024-09-05 03:54:10",
			'hall_id' => "HALL&lbrack;F&rbrack;-01",
			'row_letter' => "D",
			'column_number' => "1",
			'seat_type' => "Family",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;F&rbrack;-01-E01",
			'created_at' => "2024-09-02 03:18:39",
			'updated_at' => "2024-09-05 03:54:10",
			'hall_id' => "HALL&lbrack;F&rbrack;-01",
			'row_letter' => "E",
			'column_number' => "1",
			'seat_type' => "Family",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;F&rbrack;-02-A01",
			'created_at' => "2024-09-02 03:22:02",
			'updated_at' => "2024-09-02 03:22:02",
			'hall_id' => "HALL&lbrack;F&rbrack;-02",
			'row_letter' => "A",
			'column_number' => "1",
			'seat_type' => "Family",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;F&rbrack;-02-B01",
			'created_at' => "2024-09-02 03:22:04",
			'updated_at' => "2024-09-02 03:22:04",
			'hall_id' => "HALL&lbrack;F&rbrack;-02",
			'row_letter' => "B",
			'column_number' => "1",
			'seat_type' => "Family",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;F&rbrack;-02-C01",
			'created_at' => "2024-09-02 03:22:05",
			'updated_at' => "2024-09-02 03:22:05",
			'hall_id' => "HALL&lbrack;F&rbrack;-02",
			'row_letter' => "C",
			'column_number' => "1",
			'seat_type' => "Family",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;F&rbrack;-02-D01",
			'created_at' => "2024-09-02 03:22:06",
			'updated_at' => "2024-09-02 03:22:06",
			'hall_id' => "HALL&lbrack;F&rbrack;-02",
			'row_letter' => "D",
			'column_number' => "1",
			'seat_type' => "Family",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;F&rbrack;-02-E01",
			'created_at' => "2024-09-02 03:22:08",
			'updated_at' => "2024-09-02 03:22:08",
			'hall_id' => "HALL&lbrack;F&rbrack;-02",
			'row_letter' => "E",
			'column_number' => "1",
			'seat_type' => "Family",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-A01",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "A",
			'column_number' => "1",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-A02",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "A",
			'column_number' => "2",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-A03",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "A",
			'column_number' => "3",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-A04",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "A",
			'column_number' => "4",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-A05",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "A",
			'column_number' => "5",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-A06",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "A",
			'column_number' => "6",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-A07",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "A",
			'column_number' => "7",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-A08",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "A",
			'column_number' => "8",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-A09",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "A",
			'column_number' => "9",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-A10",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "A",
			'column_number' => "10",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-B01",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "B",
			'column_number' => "1",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-B02",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "B",
			'column_number' => "2",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-B03",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "B",
			'column_number' => "3",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-B04",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "B",
			'column_number' => "4",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-B05",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "B",
			'column_number' => "5",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-B06",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "B",
			'column_number' => "6",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-B07",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-04 05:55:35",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "B",
			'column_number' => "7",
			'seat_type' => "Premium",
			'status' => "occupied",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-B08",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "B",
			'column_number' => "8",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-B09",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "B",
			'column_number' => "9",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-B10",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "B",
			'column_number' => "10",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-C01",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "C",
			'column_number' => "1",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-C02",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "C",
			'column_number' => "2",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-C03",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "C",
			'column_number' => "3",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-C04",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "C",
			'column_number' => "4",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-C05",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "C",
			'column_number' => "5",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-C06",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-04 16:05:04",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "C",
			'column_number' => "6",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-C07",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "C",
			'column_number' => "7",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-C08",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "C",
			'column_number' => "8",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-C09",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "C",
			'column_number' => "9",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-C10",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "C",
			'column_number' => "10",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-D01",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "D",
			'column_number' => "1",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-D02",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "D",
			'column_number' => "2",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-D03",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "D",
			'column_number' => "3",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-D04",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "D",
			'column_number' => "4",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-D05",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "D",
			'column_number' => "5",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-D06",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "D",
			'column_number' => "6",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-D07",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "D",
			'column_number' => "7",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-D08",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "D",
			'column_number' => "8",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-D09",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "D",
			'column_number' => "9",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-D10",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "D",
			'column_number' => "10",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-E01",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "E",
			'column_number' => "1",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-E02",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "E",
			'column_number' => "2",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-E03",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "E",
			'column_number' => "3",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-E04",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "E",
			'column_number' => "4",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-E05",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "E",
			'column_number' => "5",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-E06",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "E",
			'column_number' => "6",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-E07",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "E",
			'column_number' => "7",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-E08",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "E",
			'column_number' => "8",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-E09",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "E",
			'column_number' => "9",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-01-E10",
			'created_at' => "2024-09-02 03:18:48",
			'updated_at' => "2024-09-02 03:18:48",
			'hall_id' => "HALL&lbrack;P&rbrack;-01",
			'row_letter' => "E",
			'column_number' => "10",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-A01",
			'created_at' => "2024-09-04 16:03:39",
			'updated_at' => "2024-09-04 16:03:39",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "A",
			'column_number' => "1",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-A02",
			'created_at' => "2024-09-04 16:03:39",
			'updated_at' => "2024-09-04 16:03:39",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "A",
			'column_number' => "2",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-A03",
			'created_at' => "2024-09-04 16:03:39",
			'updated_at' => "2024-09-04 16:03:39",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "A",
			'column_number' => "3",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-A04",
			'created_at' => "2024-09-04 16:03:39",
			'updated_at' => "2024-09-04 16:03:39",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "A",
			'column_number' => "4",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-A05",
			'created_at' => "2024-09-04 16:03:39",
			'updated_at' => "2024-09-04 16:03:39",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "A",
			'column_number' => "5",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-A06",
			'created_at' => "2024-09-04 16:03:39",
			'updated_at' => "2024-09-04 16:03:39",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "A",
			'column_number' => "6",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-A07",
			'created_at' => "2024-09-04 16:03:39",
			'updated_at' => "2024-09-04 16:03:39",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "A",
			'column_number' => "7",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-A08",
			'created_at' => "2024-09-04 16:03:39",
			'updated_at' => "2024-09-04 16:03:39",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "A",
			'column_number' => "8",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-A09",
			'created_at' => "2024-09-04 16:03:39",
			'updated_at' => "2024-09-04 16:03:39",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "A",
			'column_number' => "9",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-A10",
			'created_at' => "2024-09-04 16:03:39",
			'updated_at' => "2024-09-04 16:03:39",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "A",
			'column_number' => "10",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-B01",
			'created_at' => "2024-09-04 16:03:39",
			'updated_at' => "2024-09-04 16:03:39",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "B",
			'column_number' => "1",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-B02",
			'created_at' => "2024-09-04 16:03:39",
			'updated_at' => "2024-09-04 16:03:39",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "B",
			'column_number' => "2",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-B03",
			'created_at' => "2024-09-04 16:03:39",
			'updated_at' => "2024-09-04 16:03:39",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "B",
			'column_number' => "3",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-B04",
			'created_at' => "2024-09-04 16:03:39",
			'updated_at' => "2024-09-04 16:03:39",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "B",
			'column_number' => "4",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-B05",
			'created_at' => "2024-09-04 16:03:39",
			'updated_at' => "2024-09-04 16:03:39",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "B",
			'column_number' => "5",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-B06",
			'created_at' => "2024-09-04 16:03:39",
			'updated_at' => "2024-09-04 16:03:39",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "B",
			'column_number' => "6",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-B07",
			'created_at' => "2024-09-04 16:03:39",
			'updated_at' => "2024-09-04 16:03:39",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "B",
			'column_number' => "7",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-B08",
			'created_at' => "2024-09-04 16:03:39",
			'updated_at' => "2024-09-04 16:03:39",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "B",
			'column_number' => "8",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-B09",
			'created_at' => "2024-09-04 16:03:39",
			'updated_at' => "2024-09-04 16:03:39",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "B",
			'column_number' => "9",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-B10",
			'created_at' => "2024-09-04 16:03:39",
			'updated_at' => "2024-09-04 16:03:39",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "B",
			'column_number' => "10",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-C01",
			'created_at' => "2024-09-04 16:03:39",
			'updated_at' => "2024-09-04 16:03:39",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "C",
			'column_number' => "1",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-C02",
			'created_at' => "2024-09-04 16:03:39",
			'updated_at' => "2024-09-04 16:03:39",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "C",
			'column_number' => "2",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-C03",
			'created_at' => "2024-09-04 16:03:39",
			'updated_at' => "2024-09-04 16:03:39",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "C",
			'column_number' => "3",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-C04",
			'created_at' => "2024-09-04 16:03:39",
			'updated_at' => "2024-09-04 16:03:39",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "C",
			'column_number' => "4",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-C05",
			'created_at' => "2024-09-04 16:03:39",
			'updated_at' => "2024-09-04 16:03:39",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "C",
			'column_number' => "5",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-C06",
			'created_at' => "2024-09-04 16:03:39",
			'updated_at' => "2024-09-04 16:03:39",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "C",
			'column_number' => "6",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-C07",
			'created_at' => "2024-09-04 16:03:39",
			'updated_at' => "2024-09-04 16:03:39",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "C",
			'column_number' => "7",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-C08",
			'created_at' => "2024-09-04 16:03:39",
			'updated_at' => "2024-09-04 16:03:39",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "C",
			'column_number' => "8",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-C09",
			'created_at' => "2024-09-04 16:03:39",
			'updated_at' => "2024-09-04 16:03:39",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "C",
			'column_number' => "9",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-C10",
			'created_at' => "2024-09-04 16:03:39",
			'updated_at' => "2024-09-04 16:03:39",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "C",
			'column_number' => "10",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-D01",
			'created_at' => "2024-09-04 16:03:39",
			'updated_at' => "2024-09-04 16:03:39",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "D",
			'column_number' => "1",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-D02",
			'created_at' => "2024-09-04 16:03:39",
			'updated_at' => "2024-09-04 16:03:39",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "D",
			'column_number' => "2",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-D03",
			'created_at' => "2024-09-04 16:03:39",
			'updated_at' => "2024-09-04 16:03:39",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "D",
			'column_number' => "3",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-D04",
			'created_at' => "2024-09-04 16:03:39",
			'updated_at' => "2024-09-04 16:03:39",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "D",
			'column_number' => "4",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-D05",
			'created_at' => "2024-09-04 16:03:39",
			'updated_at' => "2024-09-04 16:03:39",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "D",
			'column_number' => "5",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-D06",
			'created_at' => "2024-09-04 16:03:39",
			'updated_at' => "2024-09-04 16:03:39",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "D",
			'column_number' => "6",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-D07",
			'created_at' => "2024-09-04 16:03:39",
			'updated_at' => "2024-09-04 16:03:39",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "D",
			'column_number' => "7",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-D08",
			'created_at' => "2024-09-04 16:03:39",
			'updated_at' => "2024-09-04 16:03:39",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "D",
			'column_number' => "8",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-D09",
			'created_at' => "2024-09-04 16:03:39",
			'updated_at' => "2024-09-04 16:03:39",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "D",
			'column_number' => "9",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-D10",
			'created_at' => "2024-09-04 16:03:40",
			'updated_at' => "2024-09-04 16:03:40",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "D",
			'column_number' => "10",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-E01",
			'created_at' => "2024-09-04 16:03:40",
			'updated_at' => "2024-09-04 16:03:40",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "E",
			'column_number' => "1",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-E02",
			'created_at' => "2024-09-04 16:03:40",
			'updated_at' => "2024-09-04 16:03:40",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "E",
			'column_number' => "2",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-E03",
			'created_at' => "2024-09-04 16:03:40",
			'updated_at' => "2024-09-04 16:03:40",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "E",
			'column_number' => "3",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-E04",
			'created_at' => "2024-09-04 16:03:40",
			'updated_at' => "2024-09-04 16:03:40",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "E",
			'column_number' => "4",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-E05",
			'created_at' => "2024-09-04 16:03:40",
			'updated_at' => "2024-09-04 16:03:40",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "E",
			'column_number' => "5",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-E06",
			'created_at' => "2024-09-04 16:03:40",
			'updated_at' => "2024-09-04 16:03:40",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "E",
			'column_number' => "6",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-E07",
			'created_at' => "2024-09-04 16:03:40",
			'updated_at' => "2024-09-04 16:03:40",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "E",
			'column_number' => "7",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-E08",
			'created_at' => "2024-09-04 16:03:40",
			'updated_at' => "2024-09-04 16:03:40",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "E",
			'column_number' => "8",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-E09",
			'created_at' => "2024-09-04 16:03:40",
			'updated_at' => "2024-09-04 16:03:40",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "E",
			'column_number' => "9",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-02-E10",
			'created_at' => "2024-09-04 16:03:40",
			'updated_at' => "2024-09-04 16:03:40",
			'hall_id' => "HALL&lbrack;P&rbrack;-02",
			'row_letter' => "E",
			'column_number' => "10",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-A01",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "A",
			'column_number' => "1",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-A02",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "A",
			'column_number' => "2",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-A03",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "A",
			'column_number' => "3",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-A04",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "A",
			'column_number' => "4",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-A05",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "A",
			'column_number' => "5",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-A06",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "A",
			'column_number' => "6",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-A07",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "A",
			'column_number' => "7",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-A08",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "A",
			'column_number' => "8",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-A09",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "A",
			'column_number' => "9",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-A10",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "A",
			'column_number' => "10",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-B01",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "B",
			'column_number' => "1",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-B02",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "B",
			'column_number' => "2",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-B03",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "B",
			'column_number' => "3",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-B04",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "B",
			'column_number' => "4",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-B05",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "B",
			'column_number' => "5",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-B06",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "B",
			'column_number' => "6",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-B07",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "B",
			'column_number' => "7",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-B08",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "B",
			'column_number' => "8",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-B09",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "B",
			'column_number' => "9",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-B10",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "B",
			'column_number' => "10",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-C01",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "C",
			'column_number' => "1",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-C02",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "C",
			'column_number' => "2",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-C03",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "C",
			'column_number' => "3",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-C04",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "C",
			'column_number' => "4",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-C05",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "C",
			'column_number' => "5",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-C06",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "C",
			'column_number' => "6",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-C07",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "C",
			'column_number' => "7",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-C08",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "C",
			'column_number' => "8",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-C09",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "C",
			'column_number' => "9",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-C10",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "C",
			'column_number' => "10",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-D01",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "D",
			'column_number' => "1",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-D02",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "D",
			'column_number' => "2",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-D03",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "D",
			'column_number' => "3",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-D04",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "D",
			'column_number' => "4",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-D05",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "D",
			'column_number' => "5",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-D06",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "D",
			'column_number' => "6",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-D07",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "D",
			'column_number' => "7",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-D08",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "D",
			'column_number' => "8",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-D09",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "D",
			'column_number' => "9",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-D10",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "D",
			'column_number' => "10",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-E01",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "E",
			'column_number' => "1",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-E02",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "E",
			'column_number' => "2",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-E03",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "E",
			'column_number' => "3",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-E04",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "E",
			'column_number' => "4",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-E05",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "E",
			'column_number' => "5",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-E06",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "E",
			'column_number' => "6",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-E07",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "E",
			'column_number' => "7",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-E08",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "E",
			'column_number' => "8",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-E09",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "E",
			'column_number' => "9",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;P&rbrack;-03-E10",
			'created_at' => "2024-09-05 02:49:42",
			'updated_at' => "2024-09-05 02:49:42",
			'hall_id' => "HALL&lbrack;P&rbrack;-03",
			'row_letter' => "E",
			'column_number' => "10",
			'seat_type' => "Premium",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-A01",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "A",
			'column_number' => "1",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-A02",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "A",
			'column_number' => "2",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-A03",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "A",
			'column_number' => "3",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-A04",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "A",
			'column_number' => "4",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-A05",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "A",
			'column_number' => "5",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-A06",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "A",
			'column_number' => "6",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-A07",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "A",
			'column_number' => "7",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-A08",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "A",
			'column_number' => "8",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-A09",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "A",
			'column_number' => "9",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-A10",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "A",
			'column_number' => "10",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-A11",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "A",
			'column_number' => "11",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-A12",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "A",
			'column_number' => "12",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-B01",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "B",
			'column_number' => "1",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-B02",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "B",
			'column_number' => "2",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-B03",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "B",
			'column_number' => "3",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-B04",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "B",
			'column_number' => "4",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-B05",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "B",
			'column_number' => "5",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-B06",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "B",
			'column_number' => "6",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-B07",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "B",
			'column_number' => "7",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-B08",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "B",
			'column_number' => "8",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-B09",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "B",
			'column_number' => "9",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-B10",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "B",
			'column_number' => "10",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-B11",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "B",
			'column_number' => "11",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-B12",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "B",
			'column_number' => "12",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-C01",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "C",
			'column_number' => "1",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-C02",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "C",
			'column_number' => "2",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-C03",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "C",
			'column_number' => "3",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-C04",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "C",
			'column_number' => "4",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-C05",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "C",
			'column_number' => "5",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-C06",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "C",
			'column_number' => "6",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-C07",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "C",
			'column_number' => "7",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-C08",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "C",
			'column_number' => "8",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-C09",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "C",
			'column_number' => "9",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-C10",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "C",
			'column_number' => "10",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-C11",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "C",
			'column_number' => "11",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-C12",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "C",
			'column_number' => "12",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-D01",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "D",
			'column_number' => "1",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-D02",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "D",
			'column_number' => "2",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-D03",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "D",
			'column_number' => "3",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-D04",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "D",
			'column_number' => "4",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-D05",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "D",
			'column_number' => "5",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-D06",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "D",
			'column_number' => "6",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-D07",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "D",
			'column_number' => "7",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-D08",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "D",
			'column_number' => "8",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-D09",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "D",
			'column_number' => "9",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-D10",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "D",
			'column_number' => "10",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-D11",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "D",
			'column_number' => "11",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-D12",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "D",
			'column_number' => "12",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-E01",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "E",
			'column_number' => "1",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-E02",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "E",
			'column_number' => "2",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-E03",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "E",
			'column_number' => "3",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-E04",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "E",
			'column_number' => "4",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-E05",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "E",
			'column_number' => "5",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-E06",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "E",
			'column_number' => "6",
			'seat_type' => "Standard",
			'status' => "occupied",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-E07",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "E",
			'column_number' => "7",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-E08",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "E",
			'column_number' => "8",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-E09",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-04 06:02:07",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "E",
			'column_number' => "9",
			'seat_type' => "Standard",
			'status' => "occupied",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-E10",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "E",
			'column_number' => "10",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-E11",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "E",
			'column_number' => "11",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-E12",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "E",
			'column_number' => "12",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-F01",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "F",
			'column_number' => "1",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-F02",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "F",
			'column_number' => "2",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-F03",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "F",
			'column_number' => "3",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-F04",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "F",
			'column_number' => "4",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-F05",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "F",
			'column_number' => "5",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-F06",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "F",
			'column_number' => "6",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-F07",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "F",
			'column_number' => "7",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-F08",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-04 06:03:21",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "F",
			'column_number' => "8",
			'seat_type' => "Standard",
			'status' => "occupied",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-F09",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "F",
			'column_number' => "9",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-F10",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "F",
			'column_number' => "10",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-F11",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "F",
			'column_number' => "11",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-F12",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "F",
			'column_number' => "12",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-G01",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "G",
			'column_number' => "1",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-G02",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "G",
			'column_number' => "2",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-G03",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "G",
			'column_number' => "3",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-G04",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "G",
			'column_number' => "4",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-G05",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "G",
			'column_number' => "5",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-G06",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "G",
			'column_number' => "6",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-G07",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "G",
			'column_number' => "7",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-G08",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "G",
			'column_number' => "8",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-G09",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "G",
			'column_number' => "9",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-G10",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "G",
			'column_number' => "10",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-G11",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "G",
			'column_number' => "11",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-G12",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "G",
			'column_number' => "12",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-H01",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "H",
			'column_number' => "1",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-H02",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "H",
			'column_number' => "2",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-H03",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "H",
			'column_number' => "3",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-H04",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "H",
			'column_number' => "4",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-H05",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "H",
			'column_number' => "5",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-H06",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "H",
			'column_number' => "6",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-H07",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "H",
			'column_number' => "7",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-H08",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "H",
			'column_number' => "8",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-H09",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "H",
			'column_number' => "9",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-H10",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "H",
			'column_number' => "10",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-H11",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "H",
			'column_number' => "11",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-H12",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "H",
			'column_number' => "12",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-I01",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "I",
			'column_number' => "1",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-I02",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "I",
			'column_number' => "2",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-I03",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "I",
			'column_number' => "3",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-I04",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "I",
			'column_number' => "4",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-I05",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "I",
			'column_number' => "5",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-I06",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "I",
			'column_number' => "6",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-I07",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "I",
			'column_number' => "7",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-I08",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "I",
			'column_number' => "8",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-I09",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "I",
			'column_number' => "9",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-I10",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "I",
			'column_number' => "10",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-I11",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "I",
			'column_number' => "11",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-I12",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "I",
			'column_number' => "12",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-J01",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "J",
			'column_number' => "1",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-J02",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "J",
			'column_number' => "2",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-J03",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "J",
			'column_number' => "3",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-J04",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "J",
			'column_number' => "4",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-J05",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "J",
			'column_number' => "5",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-J06",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "J",
			'column_number' => "6",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-J07",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "J",
			'column_number' => "7",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-J08",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "J",
			'column_number' => "8",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-J09",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "J",
			'column_number' => "9",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-J10",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "J",
			'column_number' => "10",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-J11",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-02 03:18:22",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "J",
			'column_number' => "11",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-01-J12",
			'created_at' => "2024-09-02 03:18:22",
			'updated_at' => "2024-09-04 06:10:02",
			'hall_id' => "HALL&lbrack;S&rbrack;-01",
			'row_letter' => "J",
			'column_number' => "12",
			'seat_type' => "Standard",
			'status' => "occupied",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-A01",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "A",
			'column_number' => "1",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-A02",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "A",
			'column_number' => "2",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-A03",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "A",
			'column_number' => "3",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-A04",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "A",
			'column_number' => "4",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-A05",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "A",
			'column_number' => "5",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-A06",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "A",
			'column_number' => "6",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-A07",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "A",
			'column_number' => "7",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-A08",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "A",
			'column_number' => "8",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-A09",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "A",
			'column_number' => "9",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-A10",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "A",
			'column_number' => "10",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-A11",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "A",
			'column_number' => "11",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-A12",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "A",
			'column_number' => "12",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-B01",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "B",
			'column_number' => "1",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-B02",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "B",
			'column_number' => "2",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-B03",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "B",
			'column_number' => "3",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-B04",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "B",
			'column_number' => "4",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-B05",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "B",
			'column_number' => "5",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-B06",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "B",
			'column_number' => "6",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-B07",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "B",
			'column_number' => "7",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-B08",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "B",
			'column_number' => "8",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-B09",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "B",
			'column_number' => "9",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-B10",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "B",
			'column_number' => "10",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-B11",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "B",
			'column_number' => "11",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-B12",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "B",
			'column_number' => "12",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-C01",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "C",
			'column_number' => "1",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-C02",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "C",
			'column_number' => "2",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-C03",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "C",
			'column_number' => "3",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-C04",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "C",
			'column_number' => "4",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-C05",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "C",
			'column_number' => "5",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-C06",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "C",
			'column_number' => "6",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-C07",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "C",
			'column_number' => "7",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-C08",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "C",
			'column_number' => "8",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-C09",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "C",
			'column_number' => "9",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-C10",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "C",
			'column_number' => "10",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-C11",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "C",
			'column_number' => "11",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-C12",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "C",
			'column_number' => "12",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-D01",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "D",
			'column_number' => "1",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-D02",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "D",
			'column_number' => "2",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-D03",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "D",
			'column_number' => "3",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-D04",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "D",
			'column_number' => "4",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-D05",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "D",
			'column_number' => "5",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-D06",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "D",
			'column_number' => "6",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-D07",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "D",
			'column_number' => "7",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-D08",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "D",
			'column_number' => "8",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-D09",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "D",
			'column_number' => "9",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-D10",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "D",
			'column_number' => "10",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-D11",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "D",
			'column_number' => "11",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-D12",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "D",
			'column_number' => "12",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-E01",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "E",
			'column_number' => "1",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-E02",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "E",
			'column_number' => "2",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-E03",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "E",
			'column_number' => "3",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-E04",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "E",
			'column_number' => "4",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-E05",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "E",
			'column_number' => "5",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-E06",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "E",
			'column_number' => "6",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-E07",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "E",
			'column_number' => "7",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-E08",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "E",
			'column_number' => "8",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-E09",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "E",
			'column_number' => "9",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-E10",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "E",
			'column_number' => "10",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-E11",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "E",
			'column_number' => "11",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-E12",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "E",
			'column_number' => "12",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-F01",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "F",
			'column_number' => "1",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-F02",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "F",
			'column_number' => "2",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-F03",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "F",
			'column_number' => "3",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-F04",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "F",
			'column_number' => "4",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-F05",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "F",
			'column_number' => "5",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-F06",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "F",
			'column_number' => "6",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-F07",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "F",
			'column_number' => "7",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-F08",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "F",
			'column_number' => "8",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-F09",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "F",
			'column_number' => "9",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-F10",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "F",
			'column_number' => "10",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-F11",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "F",
			'column_number' => "11",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-F12",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "F",
			'column_number' => "12",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-G01",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "G",
			'column_number' => "1",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-G02",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "G",
			'column_number' => "2",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-G03",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "G",
			'column_number' => "3",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-G04",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "G",
			'column_number' => "4",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-G05",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "G",
			'column_number' => "5",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-G06",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "G",
			'column_number' => "6",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-G07",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "G",
			'column_number' => "7",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-G08",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "G",
			'column_number' => "8",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-G09",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "G",
			'column_number' => "9",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-G10",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "G",
			'column_number' => "10",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-G11",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "G",
			'column_number' => "11",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-G12",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "G",
			'column_number' => "12",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-H01",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "H",
			'column_number' => "1",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-H02",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "H",
			'column_number' => "2",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-H03",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "H",
			'column_number' => "3",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-H04",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "H",
			'column_number' => "4",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-H05",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "H",
			'column_number' => "5",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-H06",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "H",
			'column_number' => "6",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-H07",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "H",
			'column_number' => "7",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-H08",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "H",
			'column_number' => "8",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-H09",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "H",
			'column_number' => "9",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-H10",
			'created_at' => "2024-09-02 03:21:08",
			'updated_at' => "2024-09-02 03:21:08",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "H",
			'column_number' => "10",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-H11",
			'created_at' => "2024-09-02 03:21:09",
			'updated_at' => "2024-09-02 03:21:09",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "H",
			'column_number' => "11",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-H12",
			'created_at' => "2024-09-02 03:21:09",
			'updated_at' => "2024-09-02 03:21:09",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "H",
			'column_number' => "12",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-I01",
			'created_at' => "2024-09-02 03:21:09",
			'updated_at' => "2024-09-02 03:21:09",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "I",
			'column_number' => "1",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-I02",
			'created_at' => "2024-09-02 03:21:09",
			'updated_at' => "2024-09-02 03:21:09",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "I",
			'column_number' => "2",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-I03",
			'created_at' => "2024-09-02 03:21:09",
			'updated_at' => "2024-09-02 03:21:09",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "I",
			'column_number' => "3",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-I04",
			'created_at' => "2024-09-02 03:21:09",
			'updated_at' => "2024-09-02 03:21:09",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "I",
			'column_number' => "4",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-I05",
			'created_at' => "2024-09-02 03:21:09",
			'updated_at' => "2024-09-02 03:21:09",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "I",
			'column_number' => "5",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-I06",
			'created_at' => "2024-09-02 03:21:09",
			'updated_at' => "2024-09-02 03:21:09",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "I",
			'column_number' => "6",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-I07",
			'created_at' => "2024-09-02 03:21:09",
			'updated_at' => "2024-09-02 03:21:09",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "I",
			'column_number' => "7",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-I08",
			'created_at' => "2024-09-02 03:21:09",
			'updated_at' => "2024-09-02 03:21:09",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "I",
			'column_number' => "8",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-I09",
			'created_at' => "2024-09-02 03:21:09",
			'updated_at' => "2024-09-02 03:21:09",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "I",
			'column_number' => "9",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-I10",
			'created_at' => "2024-09-02 03:21:09",
			'updated_at' => "2024-09-02 03:21:09",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "I",
			'column_number' => "10",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-I11",
			'created_at' => "2024-09-02 03:21:09",
			'updated_at' => "2024-09-02 03:21:09",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "I",
			'column_number' => "11",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-I12",
			'created_at' => "2024-09-02 03:21:09",
			'updated_at' => "2024-09-02 03:21:09",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "I",
			'column_number' => "12",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-J01",
			'created_at' => "2024-09-02 03:21:09",
			'updated_at' => "2024-09-02 03:21:09",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "J",
			'column_number' => "1",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-J02",
			'created_at' => "2024-09-02 03:21:09",
			'updated_at' => "2024-09-02 03:21:09",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "J",
			'column_number' => "2",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-J03",
			'created_at' => "2024-09-02 03:21:09",
			'updated_at' => "2024-09-02 03:21:09",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "J",
			'column_number' => "3",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-J04",
			'created_at' => "2024-09-02 03:21:09",
			'updated_at' => "2024-09-02 03:21:09",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "J",
			'column_number' => "4",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-J05",
			'created_at' => "2024-09-02 03:21:09",
			'updated_at' => "2024-09-02 03:21:09",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "J",
			'column_number' => "5",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-J06",
			'created_at' => "2024-09-02 03:21:09",
			'updated_at' => "2024-09-02 03:21:09",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "J",
			'column_number' => "6",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-J07",
			'created_at' => "2024-09-02 03:21:09",
			'updated_at' => "2024-09-02 03:21:09",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "J",
			'column_number' => "7",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-J08",
			'created_at' => "2024-09-02 03:21:09",
			'updated_at' => "2024-09-02 03:21:09",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "J",
			'column_number' => "8",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-J09",
			'created_at' => "2024-09-02 03:21:09",
			'updated_at' => "2024-09-02 03:21:09",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "J",
			'column_number' => "9",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-J10",
			'created_at' => "2024-09-02 03:21:09",
			'updated_at' => "2024-09-02 03:21:09",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "J",
			'column_number' => "10",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-J11",
			'created_at' => "2024-09-02 03:21:09",
			'updated_at' => "2024-09-02 03:21:09",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "J",
			'column_number' => "11",
			'seat_type' => "Standard",
			'status' => "open",
		]);

		DB::table('seats')->insert([
			'seat_id' => "HALL&lbrack;S&rbrack;-02-J12",
			'created_at' => "2024-09-02 03:21:09",
			'updated_at' => "2024-09-02 03:21:09",
			'hall_id' => "HALL&lbrack;S&rbrack;-02",
			'row_letter' => "J",
			'column_number' => "12",
			'seat_type' => "Standard",
			'status' => "open",
		]);
	}
}
