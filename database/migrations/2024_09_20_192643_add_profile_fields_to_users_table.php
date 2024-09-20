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
        Schema::table('users', function (Blueprint $table) {
            $table->binary('profile_photo')->nullable(); // MediumBlob type for profile photo
            $table->string('mobile_number')->nullable();     // Mobile number as string
            $table->date('date_of_birth')->nullable();       // Date of birth as date type
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['profile_photo', 'mobile_number', 'date_of_birth']);
        });
    }
};
