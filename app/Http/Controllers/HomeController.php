<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function fetchAllMovies()
    {
        $today = Carbon::today('Asia/Kuala_Lumpur');

        // Fetch movies where today's date is between screen_from_date and screen_until_date
        $movies = Movie::whereDate('screen_from_date', '<=', $today)
            ->whereDate('screen_until_date', '>=', $today)
            ->get();

        // Return the view with the filtered movies
        return view('home', compact('movies')); // Pass movies to the view
    }
}
