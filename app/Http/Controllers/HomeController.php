<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function fetchAllMovies()
    {
        $movies = Movie::all(); // Fetch all movies
        return view('home', compact('movies')); // Pass movies to the view
    }
}
