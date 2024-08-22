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
            $table->string('movie_id', length: 50)->primary();
            $table->string('movieName', 50);
            $table->text('movieSynopsis');  
            $table->string('movieGenre'); 
            $table->string('movieSubtitle'); 
            $table->string('movieLanguage');  
            $table->time('movieDuration');
            $table->string('movieDistributor', 40);  
            $table->text('movieCast');
            $table->date('releaseDate');
            $table->date('screenFromDate');
            $table->date('screenUntilDate');
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
