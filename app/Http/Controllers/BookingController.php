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
        // $movies = [
        //     (object) ['id' => 1, 'title' => 'Sample Movie 1', 'description' => 'This is a sample movie.'],
        //     (object) ['id' => 2, 'title' => 'Sample Movie 2', 'description' => 'This is another sample movie.'],
        // ];
        return view('booking.movie', compact('movies'));
    }

    //navigate into movie details view
    public function movieDetails($id)
    {
        $movie = Movie::findOrFail($id);

        return view('booking.movieDetails', compact('movie'));
    }
}
