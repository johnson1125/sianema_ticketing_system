<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('users')->upsert([
        //     [
        //         'id' => 1,
        //         'name' => 'admin',
        //         'email' => 'abc123@gmail.com',
        //         'email_verified_at' => NULL,
        //         'password' => '$2y$12$t3KS8XGBxxlrT54yDwGF2.vVoDe1trK2uDKuFcbIi4xYfNrYCLNoK',
        //         'remember_token' => NULL,
        //         'created_at' => '2024-08-20 03:18:42',
        //         'updated_at' => '2024-08-20 03:18:42',
        //         'role' => 'admin',
        //         'mobile_number' => '0123456789',
        //         'date_of_birth' => '2001-10-27'
        //     ],
        // ], ['id']);
        
    }
}
