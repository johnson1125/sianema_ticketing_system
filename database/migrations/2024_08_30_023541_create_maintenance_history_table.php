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
        Schema::create('maintenance_history', function (Blueprint $table) {
            $table->string('maintenance_id', length: 50)->primary();
            $table->date('start_date');
            $table->date('completion_date')->nullable(); // Nullable if completion date is not known immediately
            // Audio maintenance', 'Screen maintenance', 'Seat maintenance', 'Other maintenance'
            $table->string('maintenance_type', length: 50);       
            $table->text('maintenance_notes')->nullable();
            $table->string('hall_id')->references('hall_id')->on('halls');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenance_history');
    }
};
