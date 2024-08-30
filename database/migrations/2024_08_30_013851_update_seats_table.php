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
        Schema::table('seats', function (Blueprint $table) {
            // Sample of adding new column field
            // $table->string('movieID', length:
            // 50)->nullable();
            $table->char('row_letter');
            $table->integer('column_number');
            $table->string('seat_type', length:8);
            $table->enum('status', ['open', 'occupied'])->default('open');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $table->dropColumn(['row_letter', 'column_number', 'seat_type', 'status']);
    }
};
