<?php

namespace App\Services;

use App\Models\HallTimeSlot;
use App\Models\Hall;
use App\Models\MovieSeat;
use App\Models\TicketTransaction;
use App\Models\Movie;
use Illuminate\Support\Facades\Http;
use App\Services\XMLExtensionsService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

// Author: Kho Ka Jie
class BookingService
{
    public function getMoviesByDate()
    {
        $movies = Movie::getOnScreenMovies();
        return $movies;
    }

    public function getHallTimeSlot($movieID)
    {
        $movie = Movie::findOrFail($movieID);
        $todayDate = Carbon::now('Asia/Kuala_Lumpur')->format('Y-m-d H:i:s');
        $halltimeslots = HallTimeSlot::getTransactionByIdAndDate($movieID, $todayDate);

        $groupedTimeSlots = $halltimeslots->groupBy('hall_type');

        $dateList = [];
        for ($i = 0; $i <= 6; $i++) {
            $dateList[] = Carbon::now('Asia/Kuala_Lumpur')->addDays($i);
        }

        return compact('movie', 'groupedTimeSlots', 'dateList');
    }

    public function getHallTimeSlotByDate($movieID, $selectedDateTime)
    {
        $movie = Movie::findOrFail($movieID);
        $dateList = [];
        for ($i = 0; $i <= 6; $i++) {
            $dateList[] = Carbon::now('Asia/Kuala_Lumpur')->addDays($i);
        }

        $halltimeslots = HallTimeSlot::getTransactionByIdAndDate($movieID, $selectedDateTime);

        // Group halltimeslots by hall type
        $groupedTimeSlots = $halltimeslots->groupBy('hall_type');

        return compact('movie', 'groupedTimeSlots', 'dateList');
    }

    public function getSelectedMovieTimeSlotDetails($timeSlotID)
    {
        $hallTimeSlot = HallTimeSlot::find($timeSlotID);
        $movie = Movie::find($hallTimeSlot->movie_id);
        $hall = Hall::getWithID($hallTimeSlot->hall_id);
        $seats = MovieSeat::getSeatByTimeSlotId($timeSlotID);

        return compact('hallTimeSlot', 'movie', 'hall', 'seats');
    }

    public function createTransactionRecord($userId, $transactionAmount)
    {
        $todayDate = Carbon::now('Asia/Kuala_Lumpur')->format('ymd');
        $lastTransaction = TicketTransaction::whereDate('transactionDateTime', Carbon::today('Asia/Kuala_Lumpur'))
            ->orderBy('ticket_transaction_id', 'desc')
            ->first();

        if ($lastTransaction) {
            $lastNumber = (int) substr($lastTransaction->ticket_transaction_id, -5);
            $newNumber = str_pad($lastNumber + 1, 5, '0', STR_PAD_LEFT);
        } else {
            $newNumber = '00001';
        }

        $transactionId = 'TST-' . $todayDate . '-' . $newNumber;

        // Create the ticket transaction
        TicketTransaction::create([
            'ticket_transaction_id' => $transactionId,
            'custID' => $userId,
            'transactionDateTime' => Carbon::now('Asia/Kuala_Lumpur')->format('Y-m-d H:i:s'),
            'transactionAmount' => $transactionAmount,
            'transactionStatus' => 'Pending',
        ]);

        return $transactionId;
    }

    public function displayPaymentDetails($movieID, $timeSlotID, $hallID, $transactionId, $selectedSeats)
    {
        $timeSlot = HallTimeSlot::where('hall_time_slot_id', $timeSlotID)->first();
        $movie = Movie::find($movieID);
        $hall = Hall::where('hall_id', $hallID)->first();
        $transaction = TicketTransaction::where('ticket_transaction_id', $transactionId)->first();

        $selectedSeatsArray = explode(',', $selectedSeats);
        $numberOfSelectedSeats = count($selectedSeatsArray);

        return compact('selectedSeats', 'timeSlot', 'movie', 'hall', 'numberOfSelectedSeats', 'transaction');
    }

    public function completePayment($transactionID, $selectedSeats, $paymentMethod, $paymentData)
    {
        $transaction = TicketTransaction::find($transactionID);

        // Send the payment details to the Python API
        $dataToSend = [
            'transactionId' => $transactionID,
            'totalPayment' => $transaction->transactionAmount,
            'paymentMethod' => $paymentMethod,
            'paymentDetails' => $paymentData
        ];

        $response = Http::post('http://127.0.0.1:5002/api/validate-payment', $dataToSend);

        if ($response->successful()) {

            $paymentData = $response->json()[0];
            $paymentId = $paymentData['paymentID'];

            XMLExtensionsService::convertJsonToXMLFile($response, 'payment', 'xml/paymentDetails.xml');
            $payment = XMLExtensionsService::XMLFileToHTML('xml/paymentDetails.xml', 'xsl\paymentDetails.xsl');

            // Update transaction status
            $transaction->transactionStatus = 'Completed';
            $transaction->payment_id = $paymentId;
            $transaction->setSelectedSeats($selectedSeats);
            $transaction->save();

            return $payment;
        } else {
            $transaction->transactionStatus = 'Cancelled';
            $transaction->save();

            return false;
        }
    }

    public function validateUserTransaction($transactionID)
    {
        $userId = Auth::id();
        $transaction = TicketTransaction::find($transactionID);

        if (!$transaction) {
            return false;
        }

        if ($transaction->custID !== $userId || $transaction->transactionStatus !== 'Pending') {
            return false;
        }

        return true;
    }

    public function validateMovie($movie_id)
    {
        $onScreenMovies = Movie::getOnScreenMovies();
        $exists = $onScreenMovies->contains('movie_id', $movie_id);

        if ($exists) {
            return true;
        } else {
            return false;
        }
    }

    public function validateTimeSlot($timeSlotID)
    {
        $hallTimeSlot = HallTimeSlot::find($timeSlotID);
        if (!$hallTimeSlot) {
            return false;
        }
        $startDatetime = Carbon::parse($hallTimeSlot->startDateTime)->toDateTimeString();
        $todayDateTime = Carbon::now('Asia/Kuala_Lumpur')->toDateTimeString();

        return $startDatetime > $todayDateTime;
    }


}