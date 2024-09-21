<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Services\BookingService;

// Author: Kho Ka Jie
class BookingController extends Controller
{

    protected $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }


    public function fetchAllMovies()
    {
        $movies = $this->bookingService->getMoviesByDate();
        return view('booking.movie', compact('movies'));
    }

    public function movieDetails($movie_id)
    {
        $validateMovie = $this->bookingService->validateMovie($movie_id);
        if (!$validateMovie) {
            return redirect()->route('home')->with('toast', [
                'type' => 'error',
                'message' => 'This movie is not on screen.'
            ]);
        }

        $data = $this->bookingService->getHallTimeSlot($movie_id);
        return view('booking.movieDetails', compact('data'));
    }

    public function dateButtonClick(Request $request)
    {
        $selectedDate = Carbon::parse($request->input('date'))->format('Y-m-d');
        $movieID = $request->input('movie_id');

        $validateMovie = $this->bookingService->validateMovie($movieID);
        if (!$validateMovie) {
            return redirect()->route('home')->with('toast', [
                'type' => 'error',
                'message' => 'This movie is not on screen.'
            ]);
        }

        $data = $this->bookingService->getHallTimeSlotByDate($movieID, $selectedDate);
        return view('booking.movieDetails', compact('data'));
    }

    public function timeSlotSelect($timeSlotID)
    {
        $validateTimeSlot = $this->bookingService->validateTimeSlot($timeSlotID);
        if (!$validateTimeSlot) {
            return redirect()->route('home')->with('toast', [
                'type' => 'error',
                'message' => 'This time slot is unavailable.'
            ]);
        }

        $data = $this->bookingService->getSelectedMovieTimeSlotDetails($timeSlotID);
        return view('booking.movieSeat', compact('data'));
    }


    public function processPayment(Request $request)
    {
        $userId = $request->input('userID');
        $selectedSeats = $request->input('selected_seat_numbers');
        $timeSlotID = $request->input('timeSlotID');
        $movieID = $request->input('movie_id');
        $hallID = $request->input('hall_id');
        $transactionAmount = $request->input('transactionAmount');

        $transactionId = $this->bookingService->createTransactionRecord($userId, $transactionAmount);

        session([
            'selectedSeats' => $selectedSeats,
            'timeSlotID' => $timeSlotID,
            'movieID' => $movieID,
            'hallID' => $hallID,
        ]);

        return redirect()->route('showPaymentPage', ['transactionID' => $transactionId]);
    }

    public function showPaymentPage($transactionID)
    {
        // Retrieve other necessary data from the session
        $selectedSeats = session('selectedSeats');
        $timeSlotID = session('timeSlotID');
        $movieID = session('movieID');
        $hallID = session('hallID');

        session()->forget(['selectedSeats', 'timeSlotID', 'movieID', 'hallID', 'transactionID']);

        // Validate the transaction ID
        $validateUser = $this->bookingService->validateUserTransaction($transactionID);

        // If validation fails, redirect to home with an error message
        if (!$validateUser) {
            return redirect()->route('home')->with('toast', [
                'type' => 'error',
                'message' => 'Access denied. You are not authorized to access this transaction.'
            ]);
        }

        // Display payment details using the booking service
        $data = $this->bookingService->displayPaymentDetails($movieID, $timeSlotID, $hallID, $transactionID, $selectedSeats);

        // Pass data to the view
        return view('booking.payment', compact('data'));
    }

    public function completePayment(Request $request)
    {
        $transactionID = $request->input('transactionID');
        $selectedSeats = $request->input('selected_seats');
        $paymentMethod = $request->input('option');

        // Collect payment details based on the selected method
        $paymentData = [];
        if ($paymentMethod === 'Card Payment') {
            $paymentData = [
                'cardNumber' => $request->input('cardNumber'),
                'cvv' => $request->input('cvv'),
                'expiryDate' => $request->input('expiryDate')
            ];
        } elseif ($paymentMethod === 'FPX') {
            $paymentData = [
                'cardHolderName' => $request->input('cardHolderName'),
                'fpxpassword' => $request->input('fpxpassword')
            ];
        } elseif ($paymentMethod === 'TNG E-Wallet') {
            $paymentData = [
                'name' => $request->input('name'),
                'tngpassword' => $request->input('tngpassword')
            ];
        }

        $payment = $this->bookingService->completePayment($transactionID, $selectedSeats, $paymentMethod, $paymentData);
        if ($payment) {
            return redirect()->route('payment.success')->with('payment', $payment);
        } else {
            return redirect()->route('payment.failed');
        }
    }

    public function paymentSuccess()
    {
        $payment = session('payment');
        return view('booking.paymentSuccess', compact('payment'));
    }

    public function paymentFailed()
    {
        return view('booking.paymentFailed');
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
