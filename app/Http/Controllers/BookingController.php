<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\HallTimeSlot;
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
    // Fetch the movie details based on movie_id
    $movie = Movie::findOrFail($movie_id);

    // Fetch halltimeslot records where movie_id matches the provided $movie_id
    $halltimeslots = HallTimeSlot::where('movie_id', $movie_id)->get();

    // Pass both the movie and halltimeslot data to the view
    return view('booking.movieDetails', compact('movie', 'halltimeslots'));
}

}
