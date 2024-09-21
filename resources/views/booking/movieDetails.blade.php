<!-- Author: Kho Ka Jie-->

<!-- using the master page layout -->
@extends('layouts.master')

<!-- The title for this page -->
@section('title', 'MovieDetails')

<!-- all css for this page -->
@push('styles')
    @vite(['resources/css/booking/movieDetails.css'])
@endpush

<!-- html for this page -->
@section('content')
    <div class="movie-seat-selection-navbar">
        <div class="movie-seat-selection-container">
            <div class="movie-seat-selection-header">
                <div class="booking-progress">
                    <ol class="items-center w-full space-y-4 sm:flex sm:space-x-8 sm:space-y-0 rtl:space-x-reverse">
                        <li class="flex items-center custom-green text-gray-500 dark:text-gray-400 space-x-2.5 rtl:space-x-reverse">
                            <span class="flex items-center justify-center w-8 h-8 border border-custom-green rounded-full dark:border-green-400">
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

                        <li class="flex items-center text-gray-500 dark:text-gray-400 space-x-2.5 rtl:space-x-reverse">
                            <span
                                class="flex items-center justify-center w-8 h-8 border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
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
    <div class="movie-details-container" id="MovieDetailsContainer">
        <img id="movieCoverPhoto" src="{{ route('movie.coverPhoto', $data['movie']->movie_id) }} ">

        <div class="movie-details-information-container">

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
                    <h4>Subtitle</h4>
                    <p id="movieSubtitle">
                        {{ $data['movie']->movie_subtitle }}
                    </p>
                </li>
                <li>
                    <h4>Release Date</h4>
                    <p id="releaseDate">
                        {{ $data['movie']->release_date }}
                    </p>
                </li>
                <li>
                    <h4>Cast</h4>
                    <p id="movieCast">
                        {{ $data['movie']->movie_cast }}
                    </p>
                </li>
                <li>
                    <h4>Distributor</h4>
                    <p id="movieDistributer">
                        {{ $data['movie']->movie_distributor }}
                    </p>
                </li>

            </ul>
            <h4>Synopsis</h4>
            <p id="movieSynopsis">
                {{ $data['movie']->movie_synopsis }}
            </p>

        </div>

    </div>

    <div class="cinema-date-selection-container">
        <div class="cinema-date-selection">
            <ul class="date-selection">
                @foreach ($data['dateList'] as $date)
                    <li>
                        <form action="{{ route('dateButtonClick') }}" method="POST">
                            @csrf
                            <input type="hidden" name="date" value="{{ $date->format('Y-m-d') }}">
                            <input type="hidden" name="movie_id" value="{{ $data['movie']->movie_id }}">
                            <button type="submit" class="date-button" value="{{ $date->format('Y-m-d') }}">
                                <span class="day-name">{{ $date->format('D') }}</span><br>
                                <span class="day-date">{{ $date->format('d M') }}</span>
                            </button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="movie-time-selection-container">
        @foreach(['Standard', 'Premium', 'Family'] as $hallType)
            <div class="movie-time-{{ strtolower($hallType) }}">
                <h2 class="classic-header">{{ $hallType }}</h2>
                <div class="chair-image-container">
                    <img src="{{ asset('images/' . strtolower($hallType) . 'Seat.png') }}" class="chair-image" />
                    <h3 id="selectedDate"></h3>
                </div>
                <div class="movie-time">
                    @foreach ($data['groupedTimeSlots'][$hallType] ?? [] as $timeSlot)
                        <form action="{{ route('timeSlotSelect') }}" method="GET" class="time-slot-form">
                            @csrf
                            <input type="hidden" name="timeSlotID" value="{{ $timeSlot->hall_time_slot_id }}">
                            <input type="hidden" name="movie_id" value="{{ $data['movie']->movie_id }}">
                            <button type="submit" class="time-button">
                                {{ \Carbon\Carbon::parse($timeSlot->startDateTime)->format('g:i A') }}
                            </button>
                        </form>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
    





@endsection

<!-- all js for this page -->
@push('scripts')
    @vite(['resources/js/booking/movieDetails.js'])
@endpush
