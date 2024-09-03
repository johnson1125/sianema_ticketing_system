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

                    <p id="hallNum">
                        {{ $hall->hall_name }}
                    </p>

                    <img src="{{ asset('images/date.png') }}" width="20" height="20" class="icon-image" />

                    <p id="movieDate">
                        {{ $hallTimeSlot->startDateTime }}
                    </p>

                    <img src="{{ asset('images/time.png') }}" width="20" height="20" class="icon-image" />

                    <p id="movieTime">
                        {{ $hallTimeSlot->startDateTime }}
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


        <div class="seat-select-part">
            <div class="seat-description">
                <img src="{{ asset('images/selectedseat.png') }}" alt="selectedseat" width="20" height="20" />
                <p>Selected Seats</p>
                <img src="{{ asset('images/soldseat.png') }}" alt="soldseat" width="20" height="20" />
                <p>Sold</p>
                <img src="{{ asset('images/singleseat.png') }}" alt="singleseat" width="20" height="20" />
                <p>Single seat</p>
            </div>


        </div>

        <div class="screen-direction">
            <img src="{{ asset('images/screen.png') }}" width="80" height="50" />
            <img src="{{ asset('images/upArrow.png') }}" width="20" height="20" />
            <p class="direction-text">SCREEN THIS WAY</p>
        </div>


        <div class="seat-container">
            @foreach ($seats as $seat)
                <div id="seatWrapper" runat="server">
                    <!--img class="seat" src="./images/seatIcon/<%# Eval("movieSeatStatus").ToString().ToLower() == "available" ? "singleseat" : "soldseat" %>.png" alt="<%# Eval("movieSeatRow") %><%# Eval("movieSeatNo") %>" commandargument='<%# Eval("movieSeatID") %>' -->
                    <span class="seat-number">
                    </span>
                </div>
            @endforeach
        </div>

        <div class="continueButton-container">
            <!--continue button-->
        </div>
    @endsection

    <!-- all js for this page -->
    @push('scripts')
    @endpush
