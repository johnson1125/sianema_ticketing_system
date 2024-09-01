<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\HallTimeSlot;
use App\Models\Hall;
use App\Models\MovieSeat;
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

        // Get today's date in 'Y-m-d' format
        $todayDate = Carbon::today()->format('Y-m-d');

        // Fetch halltimeslot records where movie_id matches the provided $movie_id and startDateTime is today
        $halltimeslots = HallTimeSlot::where('movie_id', $movie_id)
            ->whereDate('startDateTime', $todayDate)
            ->get();

        // Get today's date and the following 6 days
        $dateList = [];
        for ($i = 0; $i <= 6; $i++) {
            $dateList[] = Carbon::today()->addDays($i);
        }

        // Pass the movie, halltimeslot, and datelist to the view
        return view('booking.movieDetails', compact('movie', 'halltimeslots', 'dateList'));
    }

    public function timeSlotSelect(Request $request)
    {

        // Retrieve values from the request
        $timeSlotID = $request->input('timeSlotID');
        $movieID = $request->input('movie_id');

        // Use the retrieved data as needed
        $hallTimeSlot = HallTimeSlot::where('hall_time_slot_id', $timeSlotID)->first();

        $movie = Movie::find($movieID);

        // Retrieve the hall data associated with the hallTimeSlot
        $hall = Hall::where('hall_id', $hallTimeSlot->hall_id) // Use the hall_id from the hallTimeSlot record
            ->first();

        $seats = MovieSeat::where('hall_time_slot_id', $timeSlotID)
            ->get();

        // Additional logic as required

        return view('booking.movieSeat', compact('hallTimeSlot', 'movie', 'seats', 'hall'));
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
