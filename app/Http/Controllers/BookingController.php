<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    //fetch all the movies from database
    public function fetchAllMovies()
    {
        $movies = Movie::all();
        return view('booking.movie', compact('movies'));
    }

    //navigate into movie details view
    public function movieDetails($movie_id)
    {
        $movie = Movie::findOrFail($movie_id);

        return view('booking.movieDetails', compact('movie'));
    }
}
