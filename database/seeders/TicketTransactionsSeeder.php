<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketTransactionsSeeder extends Seeder
{

    public function run(): void
    {
        $path = database_path('sql/ticketTransactions.sql');
        $sql = file_get_contents($path);

        // Execute the SQL dump
        DB::unprepared($sql);
    }
}
