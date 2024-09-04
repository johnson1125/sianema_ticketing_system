<!-- using the master page layout -->
@extends('layouts.master')

<!-- The title for this page -->
@section('title', 'MovieSeatSelection')

<!-- all css for this page -->
@push('styles')
    @vite(['resources/css/booking/movieSeat.css'])
@endpush

<!-- html for this page -->
@section('content')
    <div class="movie-seat-selection-navbar">
        <div class="movie-seat-selection-container">
            <img src="{{ asset('images/logoSianemaAdmin.png') }}" alt="Logo" width="160" height="60"
                class="top-nav-logo">
            <div class="movie-seat-selection-header">
                <h3 id="movieName">
                    {{ $movie->movie_name }}
                </h3>
                <div class="movie-seat-hall-time">
                    <img src="{{ asset('images/hall.png') }}" width="20" height="20" class="icon-image" />

                    <p id="hallNum" class="nav-info">
                        {{ $hall->hall_name }}
                    </p>

                    <img src="{{ asset('images/date.png') }}" width="20" height="20" class="icon-image" />

                    <p id="movieDate" class="nav-info">
                        {{ \Carbon\Carbon::parse($hallTimeSlot->startDateTime)->format('d M Y') }}
                    </p>

                    <img src="{{ asset('images/time.png') }}" width="20" height="20" class="icon-image" />

                    <p id="movieTime" class="nav-info">
                        {{ \Carbon\Carbon::parse($hallTimeSlot->startDateTime)->format('h:i A') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <section class="seat-selection-body">

        <div class="selected-seat-display">
            <h4 id="selectedSeat">
            </h4>
        </div>

        <div class="hallView">
            @if ($hall->hall_type === 'Standard')
                <div class="seat-select-part">
                    <div class="seat-description">
                        <img src="{{ asset('images/selectedseat.png') }}" alt="selectedseat" width="20"
                            height="20" />
                        <p>Selected Seats</p>
                        <img src="{{ asset('images/soldseat.png') }}" alt="soldseat" width="20" height="20" />
                        <p>Sold</p>
                        <img src="{{ asset('images/singleseat.png') }}" alt="singleseat" width="20" height="20" />
                        <p>Single seat</p>
                    </div>
                </div>
            @endif
            <div class="screen-container">
                <img class="screenImg" src="{{ asset('images/screen.png') }}" alt="Screen">
            </div>
            <div class="seat-container">
                @php
                    // Extract unique row letters from the seat identifiers
                    $rowLetters = $seats
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
                    $seats = $seats->map(function ($seat) {
                        $parts = explode('-', $seat->movie_seat_id);
                        $rowIdentifier = $parts[count($parts) - 1];
                        $seat->row_letter = substr($rowIdentifier, 0, 1);
                        $seat->column_number = (int) filter_var($rowIdentifier, FILTER_SANITIZE_NUMBER_INT);
                        return $seat;
                    });
                @endphp

                @if ($hall->hall_type === 'Standard')
                    @for ($i = 0; $i < count($rowLetters); $i++)
                        <div class="standard-row">
                            <div class="standard-left-column">
                                @for ($j = 1; $j <= 3; $j++)
                                    @php
                                        $seat = $seats
                                            ->where('row_letter', $rowLetters[$i])
                                            ->where('column_number', $j)
                                            ->first();
                                    @endphp
                                    @if ($seat)
                                        <div class="seat-box">
                                            @if ($seat->movie_seats_status === 'Available')
                                                <img class="standardSeatImg" src="{{ asset('images/singleseat.png') }}"
                                                    alt="Seat {{ $seat->movie_seat_id }}">
                                            @elseif ($seat->movie_seats_status === 'Sold')
                                                <img class="standardSeatImg" src="{{ asset('images/soldseat.png') }}"
                                                    alt="Seat {{ $seat->movie_seat_id }}">
                                            @elseif ($seat->movie_seats_status === 'Repair')
                                                <img class="standardSeatImg"
                                                    src="{{ asset('images/unavailableseat.png') }}"
                                                    alt="Seat {{ $seat->movie_seat_id }}">
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
                                        $seat = $seats
                                            ->where('row_letter', $rowLetters[$i])
                                            ->where('column_number', $j)
                                            ->first();
                                    @endphp
                                    @if ($seat)
                                        <div class="seat-box">
                                            @if ($seat->movie_seats_status === 'Available')
                                                <img class="standardSeatImg" src="{{ asset('images/singleseat.png') }}"
                                                    alt="Seat {{ $seat->movie_seat_id }}">
                                            @elseif ($seat->movie_seats_status === 'Sold')
                                                <img class="standardSeatImg" src="{{ asset('images/soldseat.png') }}"
                                                    alt="Seat {{ $seat->movie_seat_id }}">
                                            @elseif ($seat->movie_seats_status === 'Repair')
                                                <img class="standardSeatImg"
                                                    src="{{ asset('images/unavailableseat.png') }}"
                                                    alt="Seat {{ $seat->movie_seat_id }}">
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
                                        $seat = $seats
                                            ->where('row_letter', $rowLetters[$i])
                                            ->where('column_number', $j)
                                            ->first();
                                    @endphp
                                    @if ($seat)
                                        <div class="seat-box">
                                            @if ($seat->movie_seats_status === 'Available')
                                                <img class="standardSeatImg" src="{{ asset('images/singleseat.png') }}"
                                                    alt="Seat {{ $seat->movie_seat_id }}">
                                            @elseif ($seat->movie_seats_status === 'Sold')
                                                <img class="standardSeatImg" src="{{ asset('images/soldseat.png') }}"
                                                    alt="Seat {{ $seat->movie_seat_id }}">
                                            @elseif ($seat->movie_seats_status === 'Repair')
                                                <img class="standardSeatImg"
                                                    src="{{ asset('images/unavailableseat.png') }}"
                                                    alt="Seat {{ $seat->movie_seat_id }}">
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

                @if ($hall->hall_type === 'Premium')
                    @for ($i = 0; $i < sizeof($rowLetters); $i++)
                        <div class="premium-row">
                            <div class="premium-left-column">
                                @for ($j = 1; $j <= 5; $j++)
                                    @php
                                        $seat = $seats
                                            ->where('row_letter', $rowLetters[$i])
                                            ->where('column_number', $j)
                                            ->first();
                                    @endphp
                                    @if ($seat)
                                        <div class="seat-box">
                                            @if ($seat->movie_seats_status === 'Available')
                                                <img class="premiumSeatImg" src="{{ asset('images/premiumSeat.png') }}"
                                                    alt="Seat {{ $seat->movie_seat_id }}">
                                            @elseif ($seat->movie_seats_status === 'Sold')
                                                <img class="premiumSeatImg" src="{{ asset('images/soldseat.png') }}"
                                                    alt="Seat {{ $seat->movie_seat_id }}">
                                            @elseif ($seat->movie_seats_status === 'Repair')
                                                <img class="premiumSeatImg"
                                                    src="{{ asset('images/unavailablePremiumSeat.png') }}"
                                                    alt="Seat {{ $seat->movie_seat_id }}">
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
                                        $seat = $seats
                                            ->where('row_letter', $rowLetters[$i])
                                            ->where('column_number', $j)
                                            ->first();
                                    @endphp
                                    @if ($seat)
                                        <div class="seat-box">
                                            @if ($seat->movie_seats_status === 'Available')
                                                <img class="premiumSeatImg" src="{{ asset('images/premiumSeat.png') }}"
                                                    alt="Seat {{ $seat->movie_seat_id }}">
                                            @elseif ($seat->movie_seats_status === 'Sold')
                                                <img class="premiumSeatImg" src="{{ asset('images/soldseat.png') }}"
                                                    alt="Seat {{ $seat->movie_seat_id }}">
                                            @elseif ($seat->movie_seats_status === 'Repair')
                                                <img class="premiumSeatImg"
                                                    src="{{ asset('images/unavailablePremiumSeat.png') }}"
                                                    alt="Seat {{ $seat->movie_seat_id }}">
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

                @if ($hall->hall_type === 'Family')
                    @for ($i = 0; $i < sizeof($rowLetters); $i++)
                        <div class="family-row">
                            @php
                                $seat = $seats->where('row_letter', $rowLetters[$i])->first();
                            @endphp
                            @if ($seat->movie_seats_status === 'Available')
                                <img class="familySeatImg" src="{{ asset('images/familySeat.png') }}"
                                    alt="Seat {{ $seat->movie_seat_id }}">
                            @elseif ($seat->movie_seats_status === 'Sold')
                                <img class="familySeatImg" src="{{ asset('images/soldseat.png') }}"
                                    alt="Seat {{ $seat->movie_seat_id }}">
                            @elseif ($seat->movie_seats_status === 'Repair')
                                <img class="familySeatImg" src="{{ asset('images/unavailableFamilySeat.png') }}"
                                    alt="Seat {{ $seat->movie_seat_id }}">
                            @endif
                            <div class="seat-info">{{ $seat->row_letter }}{{ $seat->column_number }}
                        </div>
                    @endfor
                @endif
            </div>
        </div>


        <div class="continueButton-container">
            <!--continue button-->
        </div>
    @endsection

<!-- all js for this page -->
@push('scripts')
@vite(['resources/js/booking/movieSeat.js'])
@endpush
