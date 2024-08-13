<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     */
    public function up(): void
    {
        
        Schema::table('hall_time_slots', function (Blueprint $table) {
            $table->timestamp('startDateTime', precision: 0)->nullable();
            $table->time('duration', precision: 0)->nullable();
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
