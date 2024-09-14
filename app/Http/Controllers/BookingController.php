<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\HallTimeSlot;
use App\Models\Hall;
use App\Models\MovieSeat;
use App\Models\TicketTransaction;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use App\Services\XMLExtensionsService;

class BookingController extends Controller
{
    public function fetchAllMovies()
{

    $today = Carbon::today();

    // Fetch movies where today's date is between screen_from_date and screen_until_date
    $movies = Movie::whereDate('screen_from_date', '<=', $today)
                    ->whereDate('screen_until_date', '>=', $today)
                    ->get();

    // Return the view with the filtered movies
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
        ->whereDate('startDateTime', '=', $todayDate)
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

        $halltimeslots = HallTimeSlot::join('halls', 'hall_time_slots.hall_id', '=', 'halls.hall_id')
        ->where('hall_time_slots.movie_id', $movieID)
        ->whereDate('startDateTime', '=', $selectedDate)
        ->select('hall_time_slots.*', 'halls.hall_type')
        ->get();
    

        // Group halltimeslots by hall type
        $groupedTimeSlots = $halltimeslots->groupBy('hall_type');


        // Fetch halltimeslot records where movie_id matches the provided $movie_id and date matches the selected date
        $halltimeslots = HallTimeSlot::where('movie_id', $movieID)
            ->whereDate('startDateTime', $selectedDate)
            ->get();

        // Return the view with the data
        return view('booking.movieDetails', compact('groupedTimeSlots', 'movie', 'dateList'));
    }


    public function processPayment(Request $request)
    {
        // Retrieve all inputs from the form
        $selectedSeats = $request->input('selected_seat_numbers');
        $timeSlotID = $request->input('timeSlotID');
        $movieID = $request->input('movie_id');
        $hallID = $request->input('hall_id');
    
        // Redirect to the payment page with query parameters
        return redirect()->route('showPaymentPage', [
            'selectedSeats' => urlencode($selectedSeats),
            'timeSlotID' => $timeSlotID,
            'movieID' => $movieID,
            'hallID' => $hallID,
        ]);
    }
    
    public function showPaymentPage(Request $request)
    {
        // Retrieve data from the query parameters
        $selectedSeats = $request->query('selectedSeats');
        $timeSlotID = $request->query('timeSlotID');
        $movieID = $request->query('movieID');
        $hallID = $request->query('hallID');
    
        $timeSlot = HallTimeSlot::where('hall_time_slot_id', $timeSlotID)->first();
        $movie = Movie::find($movieID);
        $hall = Hall::where('hall_id', $hallID)->first();
    
        // Split the selected seats string into an array using commas
        $selectedSeatsArray = explode('%2C', $selectedSeats);
    
        // Count the number of selected seats
        $numberOfSelectedSeats = count($selectedSeatsArray);
    
        // Return the payment view with the retrieved data and seat count
        return view('booking.payment', compact('selectedSeats', 'timeSlot', 'movie', 'hall', 'numberOfSelectedSeats'));
    }

    public function completePayment(Request $request)
    {
        $userId = $request->input('user_id');
        $totalPayment = $request->input('total_payment');
        $selectedSeats = explode('%2C', $request->input('selected_seats'));

        // Get the selected payment method
        $paymentMethod = $request->input('option');
        $paymentData = [];

        // Collect payment details based on the selected method
        if ($paymentMethod === 'cardPayment') {
            $paymentData = [
                'cardNumber' => $request->input('cardNumber'),
                'cvv' => $request->input('cvv'),
                'expiryDate' => $request->input('expiryDate')
            ];
        } elseif ($paymentMethod === 'fpx') {
            $paymentData = [
                'cardHolderName' => $request->input('cardHolderName'),
                'fpxpassword' => $request->input('fpxpassword')
            ];
        } elseif ($paymentMethod === 'tng') {
            $paymentData = [
                'name' => $request->input('name'),
                'tngpassword' => $request->input('tngpassword')
            ];
        }

        // Generate a new transaction ID
        $todayDate = Carbon::now()->format('ymd');
        $lastTransaction = TicketTransaction::whereDate('transactionDateTime', Carbon::today())
            ->orderBy('ticket_transaction_id', 'desc')
            ->first();

        if ($lastTransaction) {
            $lastNumber = (int)substr($lastTransaction->ticket_transaction_id, -5);
            $newNumber = str_pad($lastNumber + 1, 5, '0', STR_PAD_LEFT);
        } else {
            $newNumber = '00001';
        }

        $transactionId = 'TST-' . $todayDate . '-' . $newNumber;

        // Create the ticket transaction
        TicketTransaction::create([
            'ticket_transaction_id' => $transactionId,
            'userID' => $userId,
            'transactionDateTime' => Carbon::now()->format('Y-m-d H:i:s'),
            'transactionAmount' => $totalPayment,
            'transactionStatus' => 'Pending',
        ]);

        // Send the payment details to the Python API
        try {
            $dataToSend = [
                'transactionId' => $transactionId,
                'totalPayment' => $totalPayment,
                'selectedSeats' => $selectedSeats,
                'userId' => $userId,
                'paymentMethod' => $paymentMethod,
                'paymentDetails' => $paymentData // Ensure this is nested correctly
            ];
            
            
            $response = Http::post('http://127.0.0.1:5002/api/validate-payment', $dataToSend);
            

            if ($response->successful()) {
                // Convert JSON response to XML and then to HTML
                XMLExtensionsService::convertJsonToXMLFile($response, 'payment', 'xml/paymentDetails.xml');
                $payment = XMLExtensionsService::XMLFileToHTML('xml/paymentDetails.xml', 'xsl\paymentDetails.xsl');

                // Redirect to the success page with the payment details
                return redirect()->route('payment.success')->with('payment', $payment);
            } else {
                // Handle failed payment validation
                return redirect()->back()->with('error', 'Payment Failed')->withInput();
            }
        } catch (\Exception $e) {
            // Log the error and redirect back with an error message
            Log::error('Payment API error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while processing the payment.')->withInput();
        }
    }

    // Method to display the payment success page
    public function paymentSuccess()
    {
        // Retrieve the payment details from the session
        $payment = session('payment');

        // Return the view with the payment details and success message
        return view('booking.paymentSuccess', compact('payment'));
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
