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
            // Sample of adding new column field
            // $table->string('movieID', length:
            // 50)->nullable();
            // $table->string('timeSlotType', length: 50)->nullable();
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