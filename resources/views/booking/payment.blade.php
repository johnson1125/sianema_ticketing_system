<!-- Author: Kho Ka Jie-->

<!-- using the master page layout -->
@extends('layouts.master')

<!-- The title for this page -->
@section('title', 'Payment')

<!-- all css for this page -->
@push('styles')
    @vite(['resources/css/booking/payment.css'])
@endpush

<!-- html for this page -->
@section('content')
    <div class="movie-seat-selection-navbar">
        <div class="movie-seat-selection-container">
            <div class="movie-seat-selection-header">
                <div class="booking-progress">
                    <ol class="items-center w-full space-y-4 sm:flex sm:space-x-8 sm:space-y-0 rtl:space-x-reverse">
                        <li class="flex items-center text-gray-500 dark:text-gray-400 space-x-2.5 rtl:space-x-reverse">
                            <span
                                class="flex items-center justify-center w-8 h-8 border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                                1
                            </span>
                            <span>
                                <h3 class="font-medium leading-tight">Select Time Slot</h3>
                                <p class="text-sm">Hei</p>
                            </span>
                        </li>
                        <li class="flex items-center text-gray-500 dark:text-gray-400 space-x-2.5 rtl:space-x-reverse">
                            <span
                                class="flex items-center justify-center w-8 h-8 border border-gray-500 rounded-full shrink-0 dark:border-gray-400">2
                            </span>
                            <span>
                                <h3 class="font-medium leading-tight">Select Seat</h3>
                                <p class="text-sm">HeiHei</p>
                            </span>
                        </li>

                        <li
                            class="flex items-center custom-green text-gray-500 dark:text-gray-400 space-x-2.5 rtl:space-x-reverse">
                            <span
                                class="flex items-center justify-center w-8 h-8 border border-custom-green rounded-full dark:border-green-400">
                                3
                            </span>
                            <span>
                                <h3 class="font-medium leading-tight">Pay Here</h3>
                                <p class="text-sm">HeiHeiHei</p>
                            </span>
                        </li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="movie-payment-section">
        <div class="movie-payment-container">
            <div class="movie-selection-poster">
                <img id="moviePoster" src="{{ route('movie.posterPhoto', $data['movie']->movie_id) }}">
            </div>
            <div class="movie-selection-details">
                <div class="movie-details">
                    <h1 id="movieName">
                        {{ $data['movie']->movie_name }}
                    </h1>

                    <ul class="movie-details-info1">
                        <li id="movieGenre">
                            {{ $data['movie']->movie_genre }}
                        </li>
                        <li id="movieLanguage">
                            {{ $data['movie']->movie_language }}
                        </li>
                        <li id="movieDuration">
                            {{ $data['movie']->movie_duration }}
                        </li>
                    </ul>

                    <ul class="movie-details-info2">
                        <li>
                            <h4>Cinema</h4>
                            <p>Kuala Lumpur - Sianema Pavillion</p>
                        <li>
                            <h4>Hall</h4>
                            <p id="movieHall">
                                {{ $data['hall']->hall_name }}
                            </p>
                        </li>
                        <li>
                            <h4>Time</h4>
                            <p id="movieTime">
                                {{ \Carbon\Carbon::parse($data['timeSlot']->startDateTime)->format('m/d/Y h:i A')  }}
                            </p>
                        </li>
                        <li>
                            <h4>Seat(s)</h4>
                            <p id="movieSeat">
                                @php
                                    // Split the selectedSeats by commas
                                    $selectedSeatsArray = explode('%2C', $data['selectedSeats']);
                                @endphp

                                <!-- Loop through the array and extract the seat numbers -->
                                @foreach ($selectedSeatsArray as $seat)
                                    @php
                                        // Split each seat by the hyphen and get the last part (seat number)
                                        $seatParts = explode('-', $seat);
                                        $seatNumber = $seatParts[count($seatParts) - 1]; // Get the last part as the seat number
                                    @endphp

                                    <!-- Display the seat number -->
                                    {{ $seatNumber }}
                                    @if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            </p>
                        </li>


                    </ul>

                </div>

                <div class="ticket-amount">
                    <table class="payment-details-table">
                        <tr>
                            <th>Ticket(s)</th>
                            <th>Subtotal</th>
                        </tr>
                        <tr>
                            <td>{{ $data['hall']->hall_type }} x {{ $data['numberOfSelectedSeats'] }}</td>
                            <td>
                                RM {{ $data['transaction']->transactionAmount }}
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="payButton-container">
                    <form id="paymentForm" action="{{ route('complete_payment') }}" method="POST">
                        @csrf
                        <input type="hidden" name="transactionID" value="{{ $data['transaction']->ticket_transaction_id }}">
                        <input type="hidden" name="selected_seats" value="{{ $data['selectedSeats'] }}">

                        <!-- Payment Method Selection -->
                        <div class="paymentMethod">
                            <h3>Select Payment Method:</h3>
                            <label>
                                <input type="radio" name="option" value="Card Payment"> Card Payment
                            </label>
                            <label>
                                <input type="radio" name="option" value="FPX"> FPX Payment
                            </label>
                            <label>
                                <input type="radio" name="option" value="TNG E-Wallet"> TNG E-Wallet
                            </label>
                        </div>

                        <!-- Card Payment Fields -->
                        <div id="cardPaymentFields" class="toggle-content">
                            <h3>Card Payment</h3>
                            <label for="cardNumber">Card Number:</label>
                            <input type="text" id="cardNumber" name="cardNumber" pattern="\d{1,16}" maxlength="16" autocomplete="off">
                            <small>Max 16 digits</small><br>
                        
                            <label for="cvv">CVV:</label>
                            <input type="text" id="cvv" name="cvv" pattern="\d{1,3}" maxlength="3" autocomplete="off">
                            <small>Max 3 digits</small><br>
                        
                            <label for="expiryDate">Expiry Date:</label>
                            <input type="month" id="expiryDate" name="expiryDate" autocomplete="off"><br>
                        </div>
                        
                        <!-- FPX Payment Fields -->
                        <div id="fpxFields" class="toggle-content">
                            <h3>FPX Payment</h3>
                            <label for="cardHolderName">Card Holder Name:</label>
                            <input type="text" id="cardHolderName" name="cardHolderName" autocomplete="off"><br>
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="fpxpassword" autocomplete="off"><br>
                        </div>
                        
                        <!-- TNG E-Wallet Fields -->
                        <div id="tngFields" class="toggle-content">
                            <h3>TNG E-Wallet</h3>
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" autocomplete="off"><br>
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="tngpassword" autocomplete="off"><br>
                        </div>
                        
                        <button type="submit" class="continueButton">Checkout & Pay</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    </div>

@endsection

<!-- all js for this page -->
@push('scripts')
    @vite(['resources/js/booking/payment.js'])
@endpush
