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
            $table->string('movieID', 21)->primary();
            $table->string('movieName');
            $table->text('movieSynopsis');  
            $table->string('movieGenre'); 
            $table->string('movieSubtitle'); 
            $table->string('movieLanguage');  
            $table->time('movieDuration');
            $table->string('movieDistributor');  
            $table->text('movieCast');
            $table->date('releaseDate');
            $table->date('screenFromDate');
            $table->date('screenUntilDate');
            $table->binary('moviePoster'); // Changed to binary for blob storage
            $table->binary('movieCoverPhoto'); // Changed to binary for blob storage
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
