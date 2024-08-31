<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\HallTimeSlot;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookingController extends Controller
{
    //fetch all the movies from database
    public function fetchAllMovies()
    {
        $movies = Movie::all();
        return view('booking.movie', compact('movies'));
    }

    public function movieDetails($movie_id)
    {
        // Fetch the movie details based on movie_id
        $movie = Movie::findOrFail($movie_id);

        // Fetch halltimeslot records where movie_id matches the provided $movie_id
        $halltimeslots = HallTimeSlot::where('movie_id', $movie_id)->get();

        // Get today's date and the following 6 days
        $dateList = [];
        for ($i = 0; $i <= 6; $i++) {
            $dateList[] = Carbon::today()->addDays($i);
        }

        // Pass the movie, halltimeslot, and datelist to the view
        return view('booking.movieDetails', compact('movie', 'halltimeslots', 'dateList'));
    }

    public function dateButtonClick(Request $request)
    {
        $selectedDate = $request->input('date');
        // Handle the selected date logic here

        return redirect()->back();
    }

    public function getMoviePoster($id)
        {
            $movie = Movie::find($id);
            $posterData = $movie->movie_poster;
            

            return response()->make($posterData, 200)
                ->header('Content-Type', 'image/jpeg');
        }

        public function getMovieCoverPhoto($id)
        {
            $movie = Movie::find($id);
            $imageData = $movie->movie_cover_photo;

            return response()->make($imageData, 200)
                ->header('Content-Type', 'image/jpeg');
        }

}
