<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
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
            $table->binary('movie_poster'); // Use binary for placeholder
            $table->binary('movie_cover_photo'); // Use binary for placeholder
            $table->timestamps();
        });

        // Modify columns to MEDIUMBLOB using raw SQL
        DB::statement('ALTER TABLE movies MODIFY movie_poster MEDIUMBLOB');
        DB::statement('ALTER TABLE movies MODIFY movie_cover_photo MEDIUMBLOB');
    }

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
