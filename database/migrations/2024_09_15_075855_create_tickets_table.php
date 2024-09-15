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
        Schema::create('tickets', function (Blueprint $table) {
            $table->string('ticket_id', length: 50)->primary();
            $table->timestamps();
            $table->decimal('ticket_price', 5, 2);
            $table->string('ticket_transaction_id', length: 50);
            $table->string('movie_seat_id', length: 50);
            $table->foreign('ticket_transaction_id')->references('ticket_transaction_id')->on('ticket_transactions');
            $table->foreign('movie_seat_id')->references('movie_seat_id')->on('movie_seats');
            
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
