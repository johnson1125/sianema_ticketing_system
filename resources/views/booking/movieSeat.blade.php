<!-- Author: Kho Ka Jie-->

<!-- using the master page layout -->
@extends('layouts.master')

<!-- The title for this page -->
@section('title', 'MovieSeatSelection')

<!-- all css for this page -->
@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.12.0/toastify.min.css">
    @vite(['resources/css/booking/movieSeat.css'])
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
                                <p class="text-sm"></p>
                            </span>
                        </li>
                        <li
                            class="flex items-center custom-green text-gray-500 dark:text-gray-400 space-x-2.5 rtl:space-x-reverse">
                            <span
                                class="flex items-center justify-center w-8 h-8 border border-custom-green rounded-full dark:border-green-400">
                                2
                            </span>
                            <span>
                                <h3 class="font-medium leading-tight">Select Seat</h3>
                                <p class="text-sm">Pick your preferred seat in the hall.</p>
                            </span>
                        </li>

                        <li class="flex items-center text-gray-500 dark:text-gray-400 space-x-2.5 rtl:space-x-reverse">
                            <span
                                class="flex items-center justify-center w-8 h-8 border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                                3
                            </span>
                            <span>
                                <h3 class="font-medium leading-tight">Pay Here</h3>
                                <p class="text-sm"></p>
                            </span>
                        </li>
                    </ol>
                </div>


                <h3 id="movieName">
                    {{ $data['movie']->movie_name }}
                </h3>
                <div class="movie-seat-hall-time">
                    <img src="{{ asset('images/hall.png') }}" width="25" height="20" class="icon-image" />

                    <p id="hallNum" class="nav-info">
                        {{ $data['hall']->hall_name }}
                    </p>

                    <img src="{{ asset('images/date.png') }}" width="25" height="20" class="icon-image" />

                    <p id="movieDate" class="nav-info">
                        {{ \Carbon\Carbon::parse($data['hallTimeSlot']->startDateTime)->format('d M Y') }}
                    </p>

                    <img src="{{ asset('images/time.png') }}" width="25" height="20" class="icon-image" />

                    <p id="movieTime" class="nav-info">
                        {{ \Carbon\Carbon::parse($data['hallTimeSlot']->startDateTime)->format('h:i A') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <section class="seat-selection-body">

        <div class="selected-seat-display">
            <h4>Selected Seat:</h4>
            <h4 id="selectedSeat"></h4>
        </div>

        <div class="hallView">
            @if ($data['hall']->hall_type === 'Standard')
                <div class="seat-select-part">
                    <div class="seat-description">
                        <img src="{{ asset('images/selectedStandardSeat.png') }}" alt="selectedseat"
                            class="standardSeatImg" />
                        <p>Selected</p>
                        <img src="{{ asset('images/soldStandardSeat.png') }}" alt="soldseat" class="standardSeatImg" />
                        <p>Sold</p>
                        <img src="{{ asset('images/standardSeat.png') }}" alt="standardSeat" class="standardSeatImg" />
                        <p>Available</p>
                        <img src="{{ asset('images/unavailableStandardSeat.png') }}" alt="standardSeat" class="standardSeatImg" />
                        <p>Occupied</p>
                    </div>
                </div>
            @endif

            @if ($data['hall']->hall_type === 'Premium')
                <div class="seat-select-part">
                    <div class="seat-description">
                        <img src="{{ asset('images/selectedLuxurySeat.png') }}" alt="selectedseat"
                            class="premiumSeatImg" />
                        <p>Selected</p>
                        <img src="{{ asset('images/soldLuxurySeat.png') }}" alt="soldseat" class="premiumSeatImg" />
                        <p>Sold</p>
                        <img src="{{ asset('images/premiumSeat.png') }}" alt="standardSeat" class="premiumSeatImg" />
                        <p>Available</p>
                        <img src="{{ asset('images/unavailablePremiumSeat.png') }}" alt="standardSeat" class="premiumSeatImg" />
                        <p>Occupied</p>
                    </div>
                </div>
            @endif

            @if ($data['hall']->hall_type === 'Family')
                <div class="seat-select-part">
                    <div class="seat-description">
                        <img src="{{ asset('images/selectedFamilySeat.png') }}" alt="selectedseat" class="familySeatImg" />
                        <p>Selected</p>
                        <img src="{{ asset('images/soldFamilySeat.png') }}" alt="soldseat" class="familySeatImg" />
                        <p>Sold</p>
                        <img src="{{ asset('images/familySeat.png') }}" alt="standardSeat" class="familySeatImg" />
                        <p>Available</p>
                        <img src="{{ asset('images/unavailableFamilySeat.png') }}" alt="standardSeat" class="familySeatImg" />
                        <p>Occupied</p>
                    </div>
                </div>
            @endif
            <div class="screen-container">
                <img class="screenImg" src="{{ asset('images/screen.png') }}" alt="Screen">
            </div>
            <div class="seat-container">
                @php
                    // Extract unique row letters from the seat identifiers
                    $rowLetters = $data['seats']
                        ->map(function ($seat) {
                            $parts = explode('-', $seat->movie_seat_id);
                            $rowIdentifier = $parts[count($parts) - 1];
                            $rowLetter = substr($rowIdentifier, 0, 1);
                            return $rowLetter;
                        })
                        ->unique()
                        ->values()
                        ->all();

                    // Pre-process the seats collection to assign row_letter and column_number
                    $data['seats'] = $data['seats']->map(function ($seat) {
                        $parts = explode('-', $seat->movie_seat_id);
                        $rowIdentifier = $parts[count($parts) - 1];
                        $seat->row_letter = substr($rowIdentifier, 0, 1);
                        $seat->column_number = (int) filter_var($rowIdentifier, FILTER_SANITIZE_NUMBER_INT);
                        return $seat;
                    });
                @endphp



                @if ($data['hall']->hall_type === 'Standard')
                    @for ($i = 0; $i < count($rowLetters); $i++)
                        <div class="standard-row">
                            <div class="standard-left-column">
                                @for ($j = 1; $j <= 3; $j++)
                                    @php
                                        $seat = $data['seats']
                                            ->where('row_letter', $rowLetters[$i])
                                            ->where('column_number', $j)
                                            ->first();
                                    @endphp
                                    @if ($seat)
                                        <div class="seat-box">
                                            @if ($seat->movie_seats_status === 'Available')
                                                <img class="standardSeatImg" src="{{ asset('images/standardSeat.png') }}"
                                                    alt="{{ $rowLetters[$i] }}{{ $j }}"
                                                    data-seat-id="{{ $seat->movie_seat_id }}">
                                            @elseif ($seat->movie_seats_status === 'Sold')
                                                <img class="standardSeatImg"
                                                    src="{{ asset('images/soldStandardSeat.png') }}"
                                                    alt="{{ $rowLetters[$i] }}{{ $j }}"
                                                    data-seat-id="{{ $seat->movie_seat_id }}">
                                            @elseif ($seat->movie_seats_status === 'Occupied')
                                                <img class="standardSeatImg"
                                                    src="{{ asset('images/unavailableStandardSeat.png') }}"
                                                    alt="{{ $rowLetters[$i] }}{{ $j }}"
                                                    data-seat-id="{{ $seat->movie_seat_id }}">
                                            @endif
                                            <div class="seat-info">{{ $seat->row_letter }}{{ $seat->column_number }}
                                            </div>
                                        </div>
                                    @endif
                                @endfor
                            </div>

                            <div class="standard-middle-column">
                                @for ($j = 4; $j <= 9; $j++)
                                    @php
                                        $seat = $data['seats']
                                            ->where('row_letter', $rowLetters[$i])
                                            ->where('column_number', $j)
                                            ->first();
                                    @endphp
                                    @if ($seat)
                                        <div class="seat-box">
                                            @if ($seat->movie_seats_status === 'Available')
                                                <img class="standardSeatImg" src="{{ asset('images/standardSeat.png') }}"
                                                    alt="{{ $rowLetters[$i] }}{{ $j }}"
                                                    data-seat-id="{{ $seat->movie_seat_id }}">
                                            @elseif ($seat->movie_seats_status === 'Sold')
                                                <img class="standardSeatImg"
                                                    src="{{ asset('images/soldStandardSeat.png') }}"
                                                    alt="{{ $rowLetters[$i] }}{{ $j }}"
                                                    data-seat-id="{{ $seat->movie_seat_id }}">
                                            @elseif ($seat->movie_seats_status === 'Occupied')
                                                <img class="standardSeatImg"
                                                    src="{{ asset('images/unavailableStandardSeat.png') }}"
                                                    alt="{{ $rowLetters[$i] }}{{ $j }}"
                                                    data-seat-id="{{ $seat->movie_seat_id }}">
                                            @endif
                                            <div class="seat-info">{{ $seat->row_letter }}{{ $seat->column_number }}
                                            </div>
                                        </div>
                                    @endif
                                @endfor
                            </div>

                            <div class="standard-right-column">
                                @for ($j = 10; $j <= 12; $j++)
                                    @php
                                        $seat = $data['seats']
                                            ->where('row_letter', $rowLetters[$i])
                                            ->where('column_number', $j)
                                            ->first();
                                    @endphp
                                    @if ($seat)
                                        <div class="seat-box">
                                            @if ($seat->movie_seats_status === 'Available')
                                                <img class="standardSeatImg" src="{{ asset('images/standardSeat.png') }}"
                                                    alt="{{ $rowLetters[$i] }}{{ $j }}"
                                                    data-seat-id="{{ $seat->movie_seat_id }}">
                                            @elseif ($seat->movie_seats_status === 'Sold')
                                                <img class="standardSeatImg"
                                                    src="{{ asset('images/soldStandardSeat.png') }}"
                                                    alt="{{ $rowLetters[$i] }}{{ $j }}"
                                                    data-seat-id="{{ $seat->movie_seat_id }}">
                                            @elseif ($seat->movie_seats_status === 'Occupied')
                                                <img class="standardSeatImg"
                                                    src="{{ asset('images/unavailableStandardSeat.png') }}"
                                                    alt="{{ $rowLetters[$i] }}{{ $j }}"
                                                    data-seat-id="{{ $seat->movie_seat_id }}">
                                            @endif
                                            <div class="seat-info">{{ $seat->row_letter }}{{ $seat->column_number }}
                                            </div>
                                        </div>
                                    @endif
                                @endfor
                            </div>
                        </div>
                    @endfor
                @endif

                @if ($data['hall']->hall_type === 'Premium')
                    @for ($i = 0; $i < sizeof($rowLetters); $i++)
                        <div class="premium-row">
                            <div class="premium-left-column">
                                @for ($j = 1; $j <= 5; $j++)
                                    @php
                                        $seat = $data['seats']
                                            ->where('row_letter', $rowLetters[$i])
                                            ->where('column_number', $j)
                                            ->first();
                                    @endphp
                                    @if ($seat)
                                        <div class="seat-box">
                                            @if ($seat->movie_seats_status === 'Available')
                                                <img class="premiumSeatImg" src="{{ asset('images/premiumSeat.png') }}"
                                                    alt="{{ $rowLetters[$i] }}{{ $j }}"
                                                    data-seat-id="{{ $seat->movie_seat_id }}">
                                            @elseif ($seat->movie_seats_status === 'Sold')
                                                <img class="premiumSeatImg"
                                                    src="{{ asset('images/soldLuxurySeat.png') }}"
                                                    alt="{{ $rowLetters[$i] }}{{ $j }}"
                                                    data-seat-id="{{ $seat->movie_seat_id }}">
                                            @elseif ($seat->movie_seats_status === 'Occupied')
                                                <img class="premiumSeatImg"
                                                    src="{{ asset('images/unavailablePremiumSeat.png') }}"
                                                    alt="{{ $rowLetters[$i] }}{{ $j }}"
                                                    data-seat-id="{{ $seat->movie_seat_id }}">
                                            @endif
                                            <div class="seat-info">{{ $seat->row_letter }}{{ $seat->column_number }}
                                            </div>
                                        </div>
                                    @endif
                                @endfor
                            </div>
                            <div class="premium-right-column">
                                @for ($j = 6; $j <= 10; $j++)
                                    @php
                                        $seat = $data['seats']
                                            ->where('row_letter', $rowLetters[$i])
                                            ->where('column_number', $j)
                                            ->first();
                                    @endphp
                                    @if ($seat)
                                        <div class="seat-box">
                                            @if ($seat->movie_seats_status === 'Available')
                                                <img class="premiumSeatImg" src="{{ asset('images/premiumSeat.png') }}"
                                                    alt="{{ $rowLetters[$i] }}{{ $j }}"
                                                    data-seat-id="{{ $seat->movie_seat_id }}">
                                            @elseif ($seat->movie_seats_status === 'Sold')
                                                <img class="premiumSeatImg"
                                                    src="{{ asset('images/soldLuxurySeat.png') }}"
                                                    alt="{{ $rowLetters[$i] }}{{ $j }}"
                                                    data-seat-id="{{ $seat->movie_seat_id }}">
                                            @elseif ($seat->movie_seats_status === 'Occupied')
                                                <img class="premiumSeatImg"
                                                    src="{{ asset('images/unavailablePremiumSeat.png') }}"
                                                    alt="{{ $rowLetters[$i] }}{{ $j }}"
                                                    data-seat-id="{{ $seat->movie_seat_id }}">
                                            @endif
                                            <div class="seat-info">{{ $seat->row_letter }}{{ $seat->column_number }}
                                            </div>
                                        </div>
                                    @endif
                                @endfor
                            </div>
                        </div>
                    @endfor
                @endif

                @if ($data['hall']->hall_type === 'Family')
                    @for ($i = 0; $i < sizeof($rowLetters); $i++)
                        <div class="family-row">
                            @php
                                $seat = $data['seats']->where('row_letter', $rowLetters[$i])->first();
                            @endphp
                            @if ($seat->movie_seats_status === 'Available')
                                <img class="familySeatImg" src="{{ asset('images/familySeat.png') }}"
                                    alt="{{ $seat->row_letter }}{{ $seat->column_number }}"
                                    data-seat-id="{{ $seat->movie_seat_id }}">
                            @elseif ($seat->movie_seats_status === 'Sold')
                                <img class="familySeatImg" src="{{ asset('images/soldFamilySeat.png') }}"
                                    alt="{{ $seat->row_letter }}{{ $seat->column_number }}"
                                    data-seat-id="{{ $seat->movie_seat_id }}">
                            @elseif ($seat->movie_seats_status === 'Occupied')
                                <img class="familySeatImg" src="{{ asset('images/unavailableFamilySeat.png') }}"
                                    alt="{{ $seat->row_letter }}{{ $seat->column_number }}"
                                    data-seat-id="{{ $seat->movie_seat_id }}">
                            @endif
                            <div class="seat-info">{{ $seat->row_letter }}{{ $seat->column_number }}
                            </div>
                        </div>
                    @endfor
                @endif
            </div>
        </div>


        <div class="continueButton-container">
            <form action="{{ route('payment') }}" method="POST" id="paymentForm">
                @csrf
                <input type="hidden" name="selected_seat_numbers" id="selectedSeatNumbers">
                <input type="hidden" name="timeSlotID" value="{{ $data['hallTimeSlot']->hall_time_slot_id }}">
                <input type="hidden" name="userID" value="{{Auth::user()->id}}">
                <input type="hidden" name="movie_id" value="{{ $data['movie']->movie_id }}">
                <input type="hidden" name="hall_id" value="{{ $data['hall']->hall_id }}">
                <input type="hidden" name="hall_type" value="{{ $data['hall']->hall_type }}" id="hall_type">
                <input type="hidden" name="transactionAmount" id="transactionAmount">
                <button type="submit" class="continueButton">Confirm To Payment</button>
            </form>
        </div>
    @endsection

    <!-- all js for this page -->
    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.12.0/toastify.min.js"></script>
        @vite(['resources/js/booking/movieSeat.js'])
    @endpush
