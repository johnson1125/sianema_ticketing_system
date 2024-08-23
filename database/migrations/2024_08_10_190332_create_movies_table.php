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
        Schema::create('movies', function (Blueprint $table) {
            $table->string('movie_id', 21)->primary();
            $table->string('movie_name');
            $table->text('movie_synopsis');  
            $table->string('movie_genre'); 
            $table->string('movie_subtitle'); 
            $table->string('movie_language');  
            $table->time('movie_duration');
            $table->string('movie_distributor');  
            $table->text('movie_cast');
            $table->date('release_date');
            $table->date('screen_from_date');
            $table->date('screen_until_date');
            $table->binary('movie_poster'); // Changed to binary for blob storage
            $table->binary('movie_cove_photo'); // Changed to binary for blob storage
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
