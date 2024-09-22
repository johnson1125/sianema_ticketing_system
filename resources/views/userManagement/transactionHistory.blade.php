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
    {{-- <main class="transaction-history">
    <div class="content-wrapper">
        <div class="tab-container">
            <nav class="transaction-history-nav">
                <div class="nav" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-upcoming-movie-tab" data-toggle="tab"
                        href="#nav-upcoming-movie" role="tab" aria-controls="nav-upcoming-movie"
                        aria-selected="true">Upcoming Movie</a>
                    <a class="nav-item nav-link" id="nav-last-seen-tab" data-toggle="tab" href="#nav-last-seen"
                        role="tab" aria-controls="nav-last-seen" aria-selected="false">Last Seen</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade" id="nav-last-seen" role="tabpanel" aria-labelledby="nav-last-seen-tab">
                    <asp:Repeater ID="LastSeenRepeater" runat="server">
                        <ItemTemplate>
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h5 class="movie-name"><%# Eval("transactionDateTime")%></h5>
                                    </div>
                                    <div class="card-text">
                                        <div class="movie-hall-type">
                                            <p><span>Amount </span><%# Eval("transactionAmount")%></p>
                                        </div>
                                        <div class="movie-hall-number with-icon">
                                            <p>Completed</p>
                                        </div>
                                    </div>
                                    <div class="more-info-btn-container">
                                        <a href="TransactionHistoryDetails.aspx"
                                            class="btn btn-primary more-info-btn">More info</a>
                                    </div>
                                </div>
                            </div>
                        </ItemTemplate>
                    </asp:Repeater>

                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h5 class="movie-name">Violet Evergarden: The Movie</h5>
                                <p class="movie-classification">R-13</p>
                                <p class="movie-genre">Animation, Drama, Fantasy</p>
                                <p class="divider">-</p>
                                <p class="movie-duration">140 Minutes</p>
                                <p class="divider">-</p>
                                <p class="movie-language">Japanese</p>
                            </div>
                            <div class="card-text">
                                <div class="movie-hall-type">
                                    <p><span>Hall Type: </span>Big</p>
                                </div>
                                <div class="movie-hall-number">
                                    <img src="./images/cinemaIcon/hall.png" alt="Hall" width="16"
                                        height="16" />
                                    <p>1</p>
                                </div>
                                <div class="movie-date with-icon">
                                    <img src="./images/cinemaIcon/date.png" alt="Movie Date" width="16"
                                        height="16" />
                                    <p>02-Apr-2021</p>
                                </div>
                                <div class="movie-time with-icon">
                                    <img src="./images/cinemaIcon/time.png" alt="Movie Time" width="16"
                                        height="16" />
                                    <p>3:15 pm</p>
                                </div>
                                <div class="number-of-seats with-icon">
                                    <img src="./images/cinemaIcon/seat.png" alt="Number of Seats" width="16"
                                        height="16" />
                                    <p>1<span> Seat(s)</span></p>
                                </div>
                                <div class="booked-seats">
                                    <p>H12</p>
                                </div>
                            </div>
                            <div class="more-info-btn-container">
                                <a href="TransactionHistoryDetails.aspx" class="btn btn-primary more-info-btn">More
                                    info</a>
                            </div>
                        </div>
                        <div class="card-footer text-muted text-right duration-since-movie-date">
                            3 years ago
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show active" id="nav-upcoming-movie" role="tabpanel"
                    aria-labelledby="nav-upcoming-movie-tab">
                    <asp:Repeater ID="UpcomingMovieRepeater" runat="server">
                        <ItemTemplate>
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h5 class="movie-name"><%# Eval("MovieName")%></h5>
                                        <p class="movie-classification"><%# Eval("MovieClassification")%></p>
                                        <p class="movie-genre"><%# Eval("MovieGenre")%></p>
                                        <p class="divider">-</p>
                                        <p class="movie-duration"><%# Eval("MovieDuration")%></p>
                                        <p class="divider">-</p>
                                        <p class="movie-language"><%# Eval("MovieLanguage")%></p>
                                    </div>
                                    <div class="card-text">
                                        <div class="movie-hall-type">
                                            <p><span>Hall Type: </span><%# Eval("MovieHallType")%></p>
                                        </div>
                                        <div class="movie-hall-number with-icon">
                                            <img src="./images/cinemaIcon/hall.png" alt="Hall" width="16"
                                                height="16" />
                                            <p><%# Eval("MovieHallNumber")%></p>
                                        </div>
                                        <div class="movie-date with-icon">
                                            <img src="./images/cinemaIcon/date.png" alt="Movie Date" width="16"
                                                height="16" />
                                            <p><%# Eval("MovieDate")%></p>
                                        </div>
                                        <div class="movie-time with-icon">
                                            <img src="./images/cinemaIcon/time.png" alt="Movie Time" width="16"
                                                height="16" />
                                            <p><%# Eval("MovieTime")%></p>
                                        </div>
                                        <div class="number-of-seats with-icon">
                                            <img src="./images/cinemaIcon/seat.png" alt="Number of Seats"
                                                width="16" height="16" />
                                            <p><%# Eval("NumberOfSeats")%><span> Seat(s)</span></p>
                                        </div>
                                        <div class="booked-seats">
                                            <p><%# Eval("BookedSeats")%></p>
                                        </div>
                                    </div>
                                    <div class="more-info-btn-container">
                                        <a href="TransactionHistoryDetails.aspx"
                                            class="btn btn-primary more-info-btn">More info</a>
                                    </div>
                                </div>
                            </div>
                        </ItemTemplate>
                    </asp:Repeater>

                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h5 class="movie-name">Violet Evergarden: The Movie</h5>
                                <p class="movie-classification">R-13</p>
                                <p class="movie-genre">Animation, Drama, Fantasy</p>
                                <p class="divider">- </p>
                                <p class="movie-duration">140 Minutes</p>
                                <p class="divider">- </p>
                                <p class="movie-language">Japanese</p>
                            </div>
                            <div class="card-text">
                                <div class="movie-hall-type">
                                    <p><span>Hall Type: </span>Big</p>
                                </div>
                                <div class="movie-date with-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                                        <path
                                            d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                                    </svg>
                                    <p>02-Apr-2021</p>
                                </div>
                                <div class="movie-time with-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                        <path
                                            d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z" />
                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0" />
                                    </svg>
                                    <p>3:15 pm</p>
                                </div>
                                <div class="number-of-seats with-icon">
                                    <img src="./images/seatIcon/unavailableseat.png" alt="Alternate Text"
                                        width="16" height="16" />
                                    <p>1<span> Seat(s)</span></p>
                                </div>
                                <div class="booked-seats">
                                    <p>H12</p>
                                </div>
                            </div>
                            <div class="more-info-btn-container">
                                <a href="TransactionHistoryDetails.aspx" class="btn btn-primary more-info-btn">More
                                    info</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main> --}}



    <div class="container">


        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
            <div class="tabContainer">
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

        {{-- <div class="tabContainer mb-4 border-b border-gray-200 dark:border-gray-700">
    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
        
        role="tablist">
        <li class="tab me-2" role="presentation">
            <button class="tabBtn inline-block p-4 border-b-2 rounded-t-lg " id="movie-tab"
                data-tabs-target="#movie" type="button" role="tab" aria-controls="movie"
                aria-selected={{ !session('activeTab') ? ($data['activeTab'] == 'movie' ? 'true' : 'false') : (session('activeTab') == 'movie' ? 'true' : 'false') }}>Movie</button>
        </li>
        <li class="tab me-2" role="presentation">
            <button
                class="tabBtn inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                id="maintenance-tab" data-tabs-target="#maintenance" type="button" role="tab"
                aria-controls="maintenance"
                aria-selected={{ !session('activeTab') ? ($data['activeTab'] == 'Maintenance' ? 'true' : 'false') : (session('activeTab') == 'maintenance' ? 'true' : 'false') }}
                {{ session('maintenanceTabStatus') == 'Disable' || $data['maintenanceTabStatus'] == 'Disable' ? 'disabled' : '' }}>Maintenance</button>
        </li>
    </ul>
</div> --}}
        <div id="transaction-history-content">
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="upcoming" role="tabpanel"
                aria-labelledby="upcoming-tab">
                <div
                    class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy
                            technology acquisitions 2021</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology
                        acquisitions of 2021 so far, in reverse chronological order.</p>
                    <a href="#"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Read more
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="lastSeen" role="tabpanel"
                aria-labelledby="lastSeen-tab">
                <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                        class="font-medium text-gray-800 dark:text-white">Dashboard tab's associated content</strong>.
                    Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps
                    classes to control the content visibility and styling.</p>
            </div>

        </div>

    </div>





@endsection
