<!-- Author: Lim Yu Her  -->

<!-- using the master page layout -->
@extends('layouts.master')

<!-- The title for this page -->
@section('title', 'Transaction History')

<!-- all css for this page -->
@push('styles')
    @vite(['resources/css/userManagement/transactionHistory.css'])
@endpush


@section('content')

    <div class="container">

        <div class="title">
            <h2>Transaction History</h2>
        </div>

        <div class="tabContainer">
            <div class="mb-4 border-b border-gray-200 dark:border-gray-700">

                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" role="tablist"
                    data-tabs-toggle="#transaction-history-content"
                    data-tabs-active-classes="text-sianema-green dark:text-green-500 dark:hover:text-green-500 border-sianema-green dark:border-green-500"
                    data-tabs-inactive-classes="text-white border-white hover:text-sianema-green hover:border-sianema-green dark:border-transparent text-white-100 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300">

                    <li class="tab me-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab"
                            data-tabs-target="#upcoming" type="button" role="tab" aria-controls="profile"
                            aria-selected="false">Upcoming movie</button>
                    </li>
                    <li class="tab me-2" role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                            id="dashboard-tab" data-tabs-target="#lastSeen" type="button" role="tab"
                            aria-controls="dashboard" aria-selected="false">Last Seen</button>
                    </li>

                </ul>
            </div>
        </div>

        <div id="transaction-history-content">
            <div class="tab-content hidden p-4 rounded-lg bg-black dark:bg-gray-800" id="upcoming" role="tabpanel"
                aria-labelledby="upcoming-tab">

                @if ($upComings->isEmpty())
                    <div class="emptyTextBox">
                        <p class="text-center text-white">No upcoming movie transactions available.</p>
                    </div>
                @else
                    @foreach ($upComings as $upComing)
                        <div
                            class="card-container p-6 bg-gray-600   rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <div class="card-title">
                                <div class="card-title-1">
                                    <h5 class="movie-name">{{ $upComing->movie->movie_name }}</h5>
                                </div>
                                <div class="card-title-2">
                                    <p class="movie-genre">{{ $upComing->movie->movie_genre }}</p>
                                    <p class="movie-duration">{{ $upComing->movie->movie_duration }}</p>
                                    <p class="movie-language">{{ $upComing->movie->movie_language }}</p>
                                </div>
                            </div>
                            <div class="card-text">
                                <div class="movie-hall-type">
                                    <p>{{ $upComing->hall->hall_type }}</p>
                                </div>
                                <div class="movie-hall-number with-icon">
                                    <p>{{ $upComing->hall->hall_name }}</p>
                                </div>
                                <div class="movie-date-time with-icon">
                                    <p>{{ $upComing->hallTimeSlot->startDateTime }}</p>
                                </div>

                                <div class="number-of-seats with-icon">
                                    <p>{{ $upComing->seatCount }}<span> Seat(s)</span></p>
                                </div>
                                <div class="booked-seats">
                                    <p>{{ $upComing->seatNumbers }}</p>
                                </div>
                            </div>

                            <div class="button-wrapper">
                                <a href="{{ route('transactionMoreDetails', ['transaction_id' => $upComing->ticket_transaction_id]) }}"
                                    class=" btn-more-details inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    More Details
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="tab-content hidden p-4 rounded-lg dark:bg-gray-800" id="lastSeen" role="tabpanel"
                aria-labelledby="lastSeen-tab">

                @if ($lastSeens->isEmpty())
                    <div class="emptyTextBox">
                        <p class="text-center text-white">No last seen transactions available.</p>
                    </div>
                @else
                    @foreach ($lastSeens as $lastSeen)
                        <div
                            class="card-container p-6 bg-gray-600   rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <div class="card-title">
                                <div class="card-title-1">
                                    <h5 class="movie-name">{{ $lastSeen->movie->movie_name }}</h5>
                                </div>
                                <div class="card-title-2">
                                    <p class="movie-genre">{{ $lastSeen->movie->movie_genre }}</p>
                                    <p class="movie-duration">{{ $lastSeen->movie->movie_duration }}</p>
                                    <p class="movie-language">{{ $lastSeen->movie->movie_language }}</p>
                                </div>

                            </div>
                            <div class="card-text">
                                <div class="movie-hall-type">
                                    <p>{{ $lastSeen->hall->hall_type }}</p>
                                </div>
                                <div class="movie-hall-number with-icon">
                                    <p>{{ $lastSeen->hall->hall_name }}</p>
                                </div>
                                <div class="movie-date-time with-icon">
                                    <p>{{ $lastSeen->hallTimeSlot->startDateTime }}</p>
                                </div>

                                <div class="number-of-seats with-icon">
                                    <p>{{ $lastSeen->seatCount }}<span> Seat(s)</span></p>
                                </div>
                                <div class="booked-seats">
                                    <p>{{ $lastSeen->seatNumbers }}</p>
                                </div>
                            </div>

                            <div class="button-wrapper">
                                <a href="{{ route('transactionMoreDetails', ['transaction_id' => $lastSeen->ticket_transaction_id]) }}"
                                    class=" btn-more-details inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    More Details
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

        </div>

    </div>
@endsection
