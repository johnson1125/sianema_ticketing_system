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
        Schema::create('movie_seats', function (Blueprint $table) {
            $table->string('id', length: 50)->primary();
            $table->timestamps();
            $table->string('transaction_id', length: 50)->nullable();
            $table->foreign('transaction_id')->references('id')->on('ticket_transactions');
            $table->string('hall_timeslot_id', length: 50)->nullable();;
            $table->foreign('hall_timeslot_id')->references('id')->on('hall_time_slots');
            $table->string('seat_id', length: 50)->nullable();
            $table->foreign('seat_id')->references('id')->on('seats');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_seats');
    }
};