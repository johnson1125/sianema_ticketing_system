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
        $todayDate = Carbon::now('Asia/Kuala_Lumpur')->format('Y-m-d');

        $halltimeslots = HallTimeSlot::join('halls', 'hall_time_slots.hall_id', '=', 'halls.hall_id')
        ->where('hall_time_slots.movie_id', $movie_id)
        ->whereDate('startDateTime', '>=', $todayDate)
        ->whereDate('startDateTime', '<=', Carbon::today()->addDays(6)->format('Y-m-d'))
        ->select('hall_time_slots.*', 'halls.hall_type')
        ->get();
    

        // Group halltimeslots by hall type
        $groupedTimeSlots = $halltimeslots->groupBy('hall_type');

        // Get today's date and the following 6 days
        $dateList = [];
        for ($i = 0; $i <= 6; $i++) {
            $dateList[] = Carbon::now('Asia/Kuala_Lumpur')->addDays($i);
        }

        // Pass the movie, grouped halltimeslots, and dateList to the view
        return view('booking.movieDetails', compact('movie', 'groupedTimeSlots', 'dateList'));
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
        // Convert the input date string to a Carbon instance and format it to 'Y-m-d'
        $selectedDate = Carbon::parse($request->input('date'))->format('Y-m-d');

        $movieID = $request->input('movie_id');

        // Fetch the movie details based on movie_id
        $movie = Movie::findOrFail($movieID);

        // Get today's date and the following 6 days
        $dateList = [];
        for ($i = 0; $i <= 6; $i++) {
            $dateList[] = Carbon::now('Asia/Kuala_Lumpur')->addDays($i);
        }

        // Fetch halltimeslot records where movie_id matches the provided $movie_id and date matches the selected date
        $halltimeslots = HallTimeSlot::where('movie_id', $movieID)
            ->whereDate('startDateTime', $selectedDate)
            ->get();

        // Return the view with the data
        return view('booking.movieDetails', compact('halltimeslots', 'movie', 'dateList'));
    }


    public function processPayment(Request $request)
    {
        // Retrieve the selected seats from the request
        $selectedSeats = $request->input('selected_seat_numbers');

        // Example processing: Save to session, database, or pass to payment gateway
        // For example, saving the selected seats to the session
        session(['selected_seat_numbers' => $selectedSeats]);

        // Redirect to the payment page with the necessary data
        return redirect()->route('showPaymentPage')->with('selectedSeats', $selectedSeats);
    }

    // Additional method to show the payment page
    public function showPaymentPage()
    {
        $selectedSeats = session('selected_seat_numbers', []);
        // Return the payment view with the selected seats
        return view('payment', compact('selectedSeats'));
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
