<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\HallTimeSlot;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Services\BookingService;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

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
        $selectedDateTime = Carbon::parse($request->input('date'))->format('Y-m-d H:i:s');
        $movieID = $request->input('movie_id');

        $validateMovie = $this->bookingService->validateMovie($movieID);
        if (!$validateMovie) {
            return redirect()->route('home')->with('toast', [
                'type' => 'error',
                'message' => 'This movie is not on screen.'
            ]);
        }

        $data = $this->bookingService->getHallTimeSlotByDate($movieID, $selectedDateTime);
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
        $transactionAmount = $request->input('transactionAmount');

        $transactionId = $this->bookingService->createTransactionRecord($userId, $transactionAmount);

        $hashedTransactionID = Crypt::encrypt($transactionId);
        $hashedSelectedSeats = Crypt::encrypt($selectedSeats);
        $hashedTimeSlotID = Crypt::encrypt($timeSlotID);

        return redirect()->route('showPaymentPage', [
            'transactionID' => $hashedTransactionID,
            'selectedSeats' => $hashedSelectedSeats,
            'timeSlotID' => $hashedTimeSlotID
        ]);
    }

    public function showPaymentPage($transactionID, $selectedSeats, $timeSlotID)
    {

        try {
            // Attempt to decrypt the transaction ID
            $transactionID = Crypt::decrypt($transactionID);
        } catch (DecryptException $e) {
            return redirect()->route('home')->with('toast', [
                'type' => 'error',
                'message' => 'Access denied. You are not authorized to access this transaction.'
            ]);
        }
    
        try {
            // Attempt to decrypt the selected seats
            $selectedSeats = Crypt::decrypt($selectedSeats);
        } catch (DecryptException $e) {
            return redirect()->route('home')->with('toast', [
                'type' => 'error',
                'message' => 'Access denied. You are not authorized to access the selected seats data.'
            ]);
        }
    
        try {
            // Attempt to decrypt the time slot ID
            $timeSlotID = Crypt::decrypt($timeSlotID);
        } catch (DecryptException $e) {
            return redirect()->route('home')->with('toast', [
                'type' => 'error',
                'message' => 'Access denied. You are not authorized to access this time slot.'
            ]);
        }

        $validateUser = $this->bookingService->validateUserTransaction($transactionID);
        $validateTimeSlot = $this->bookingService->validateTimeSlot($timeSlotID);

        $timeSlot = HallTimeSlot::find($timeSlotID);
        $movie_id = $timeSlot->movie_id;
        $hall_id = $timeSlot->hall_id;

        if (!$validateUser || !$validateTimeSlot) {
            return redirect()->route('home')->with('toast', [
                'type' => 'error',
                'message' => 'Access denied. You are not authorized to access this transaction.'
            ]);
        }
        $data = $this->bookingService->displayPaymentDetails($movie_id, $timeSlotID, $hall_id, $transactionID, $selectedSeats);

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

        session()->forget(['selectedSeats', 'timeSlotID', 'movieID', 'hallID', 'transactionID']);

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
