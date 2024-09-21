<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('ticket_transactions', function (Blueprint $table) {
            $table->date('transactionDateTime');
            $table->decimal('transactionAmount', 8, 2); 
            $table->enum('transactionStatus', ['Pending', 'Completed', 'Cancelled']);  
            $table->string('custID');
            $table->foreign('custID')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
