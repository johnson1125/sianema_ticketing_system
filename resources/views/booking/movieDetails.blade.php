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
    <div class="movie-details-container" id="MovieDetailsContainer">
        <img id="movieCoverPhoto" src="{{ route('movie.coverPhoto', $movie->movie_id) }} ">

        <div class="movie-details-information-container">

            <h1 id="movieName">
                {{ $movie->movie_name }}
            </h1>

            <ul class="movie-details-info1">
                <li id="movieGenre">
                    {{ $movie->movie_genre }}
                </li>
                <li id="movieLanguage">
                    {{ $movie->movie_language }}
                </li>
                <li id="movieDuration">
                    {{ $movie->movie_duration }}
                </li>
            </ul>


            <ul class="movie-details-info2">
                <li>
                    <h4>Subtitle</h4>
                    <p id="movieSubtitle">
                        {{ $movie->movie_subtitle }}
                    </p>
                </li>
                <li>
                    <h4>Release Date</h4>
                    <p id="releaseDate">
                        {{ $movie->release_date }}
                    </p>
                </li>
                <li>
                    <h4>Cast</h4>
                    <p id="movieCast">
                        {{ $movie->movie_cast }}
                    </p>
                </li>
                <li>
                    <h4>Distributor</h4>
                    <p id="movieDistributer">
                        {{ $movie->movie_distributor }}
                    </p>
                </li>

            </ul>
            <h4>Synopsis</h4>
            <p id="movieSynopsis">
                {{ $movie->movie_synopsis }}
            </p>

        </div>

    </div>

    <div class="cinema-date-selection-container">
        <div class="cinema-date-selection">
            <ul class="date-selection">
                @foreach ($dateList as $date)
                    <li>
                        <form action="{{ route('dateButtonClick') }}" method="POST">
                            @csrf
                            <button type="submit" class="date-button" name="date" value="{{ $date->format('Y-m-d') }}">
                                {{ $date->format('D
                                d-M') }}
                            </button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="movie-time-selection-container">
        <div class="movie-time-selection">
            <h2 class="classic-header">Classic</h2>
            <div class="chair-image-container">
                <img src="./images/seatIcon/singleseat.png" height="50" width="50" class="chair-image" />
                <h3 id="selectedDate"></h3>

            </div>
            <div class="movie-time">
                @foreach ($halltimeslots as $timeSlot)
                    <!--asp:Button ID="TimeButton" runat="server" CssClass="time-button" Text='<%# Eval("hallTimeSlotTime") %>' CommandArgument='<%# Eval("hallTimeSlotID") %>' OnClick="Button_Click" /-->
                @endforeach
            </div>
        </div>
    </div>


    @endsection

    <!-- all js for this page -->
    @push('scripts')
        {{-- @vite(['']) --}}
    @endpush
