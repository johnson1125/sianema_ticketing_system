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
        Schema::table('hall_time_slots', function (Blueprint $table) {
            $table->unsignedBigInteger('hall_id')->nullable();
            $table->unsignedBigInteger('movie_id')->nullable();
            $table->foreign('hall_id')->references('id')->on('halls'); 
            $table->foreign('movie_id')->references('id')->on('movies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hall_time_slots', function (Blueprint $table) {
            //
        });
    }
};
