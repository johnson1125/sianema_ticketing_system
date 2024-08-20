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
        Schema::create('hall_time_slots', function (Blueprint $table) {
            $table->string('id', length: 50)->primary();
            $table->timestamps();
            $table->timestamp('startDateTime', precision: 0)->nullable();
            $table->time('duration', precision: 0)->nullable();
            $table->string('timeSlotType', length: 50)->nullable();
            $table->string('hall_id', length: 50)->nullable();
            $table->string('movie_id', length: 50)->nullable();
            $table->foreign('hall_id')->references('id')->on('halls');
            $table->foreign('movie_id')->references('id')->on('movies');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hall_time_slots');
    }
};
