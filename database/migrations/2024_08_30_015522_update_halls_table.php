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
        Schema::table('halls', function (Blueprint $table) {
            // Sample of adding new column field
            // $table->string('movieID', length:
            // 50)->nullable();
            $table->string('hall_name', length:16);
            $table->string('hall_type', length:8);      
            $table->enum('status', ['open', 'closed'])->default('open');       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $table->dropColumn(['hall_name', 'hall_type', 'status']);
    }
};
