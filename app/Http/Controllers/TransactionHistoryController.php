<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Hall;
use App\Models\User;
use App\Models\Movie;
use App\Models\Ticket;
use App\Models\MovieSeat;
use App\Models\HallTimeSlot;
use Illuminate\Http\Request;
use App\Models\TicketTransaction;
use App\Services\PaymentService;
use Illuminate\Support\Facades\Auth;

class TransactionHistoryController extends Controller
{
    public function fetchTransactionHistory()
    {
        $userID = Auth::user()->id;

        $completedTransactions = TicketTransaction::where('transactionStatus', 'Completed')->where('custID', $userID)->get();

        $userTransactions = $completedTransactions->map(function ($transaction) {
            $tickets = Ticket::Where('ticket_transaction_id', $transaction->ticket_transaction_id)->get();
            $movieSeat = MovieSeat::findOrFail($tickets[0]->movie_seat_id);
            $hallTimeSlot = HallTimeSlot::findOrFail($movieSeat->hall_time_slot_id);
            $hall = Hall::findOrFail($hallTimeSlot->hall_id);
            $movie = Movie::findOrFail($hallTimeSlot->movie_id);
            $seatNumbers = $tickets->map(function ($seat) {
                return substr($seat->movie_seat_id, -3); // Extract last 3 characters (A01, A02, etc.)
            })->implode(', ');
            $seatCount = $tickets->count();

            $transaction->hallTimeSlot = $hallTimeSlot;
            $transaction->hall = $hall;
            $transaction->movie = $movie;
            $transaction->seatNumbers = $seatNumbers;
            $transaction->seatCount = $seatCount;


            return $transaction;
        });

        [$upComing, $lastSeen] = $userTransactions->partition(function ($transaction) {
            $result = Carbon::parse($transaction->hallTimeSlot->startDateTime)->greaterThan(Carbon::now());
            return $result;
        });

        $upComings = $upComing->sortBy(function($transaction) {
            return strtotime($transaction->transactionDateTime); // Convert to timestamp for comparison
        });

        $lastSeens = $lastSeen->sortBy(function($transaction) {
            return strtotime($transaction->transactionDateTime); // Convert to timestamp for comparison
        });

        return view('userManagement.transactionHistory', compact('upComings','lastSeens'));
    }

    public function fetchTransactionDetails($transactionID){
        $paymentDetails = PaymentService::getPaymentData($transactionID);

        if ($paymentDetails instanceof \Illuminate\Http\RedirectResponse) {
            return $paymentDetails;  // Return the redirect response directly
        }
       
        return view('userManagement.transactionMoreDetails', compact('paymentDetails')); // Pass movies to the view
    }
}
