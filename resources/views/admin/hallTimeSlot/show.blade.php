<!-- Author: Ong Cheng Leong-->
<!-- using the master page layout -->
@extends('layouts.masterAdmin')

<!-- The title for this page -->
@section('title', 'Manage Hall Time Slot')

<!-- all css for this page -->
@push('styles')
    @vite(['resources/css/admin/hallTimeSlot/show.css'])
@endpush

<!-- html for this page -->
@section('content')
    <div id="container">

        <div id="section1">
            <div id='header'>
                <h6>Hall Timeslot Details</h6>
            </div>
        </div>

        <div id="section2"class="relative overflow-x-auto shadow-md sm:rounded-lg bg-gray-50">
            <div id="section2-1">
                <div id="section2-1-1">
                    <h2 class='label'>Hall Timeslot ID</h2>
                    <div class='textContainer'>
                        {{ $data['hallTimeSlot']->hall_time_slot_id }}
                    </div>

                    <h2 class='label'>Hall Timeslot Type</h2>
                    <div class='textContainer'>
                        {{ $data['hallTimeSlot']->timeSlotType }}
                    </div>

                    <h2 class='label'>Hall ID</h2>

                    <div class='textContainer'>
                        {{ $data['hallTimeSlot']->hall_id }}
                    </div>

                </div>
                <div id="section2-1-2">
                    <h2 class='label'>Start Date Time</h2>
                    <div class='textContainer'>
                        {{ $data['hallTimeSlot']->startDateTime }}
                    </div>
                    <h2 class='label'>Duration</h2>
                    <div class='textContainer'>
                        {{ $data['hallTimeSlot']->duration }}
                    </div>
                </div>
            </div>

            @if ($data['hallTimeSlot']->timeSlotType == 'Movie')
                <div class="movieSection">
                    <div class="flex-container">
                        <div class="display-top-left">
                            <div class="poster-group">
                                <label><b>Movie Poster: </b></label>
                                <br><span><img class= "poster" src="{{ route('movie.poster', $data['movie']->movie_id) }}"
                                        alt="{{ $data['movie']->movie_name }}"></span>
                            </div>
                        </div>
                        <div class="display-top-right">
                            <div class="id-group">
                                <br />
                                <label><b>Movie ID: </b></label>
                                <span>{{ $data['movie']->movie_id }}</span>
                            </div>

                            <div class="name-group">
                                <label><b>Movie Name: </b></label>
                                <span>{{ $data['movie']->movie_name }}</span>
                            </div>

                            <div class="genre-group">
                                <label><b>Movie Genre: </b></label>
                                <span>{{ $data['movie']->movie_genre }}</span>
                            </div>

                            <div class="language-group">
                                <label><b>Movie Language: </b></label>
                                <span>{{ $data['movie']->movie_language }}</span>
                            </div>

                            <div class="subtitle-group">
                                <label><b>Movie Subtitle: </b></label>
                                <span>{{ $data['movie']->movie_subtitle }}</span>
                            </div>

                            <div class="duration-group">
                                <label><b>Movie Duration: </b></label>
                                <span>{{ $data['movie']->movie_duration }}</span>
                            </div>

                            <div class="distributor-group">
                                <label><b>Movie Distributor: </b></label>
                                <span>{{ $data['movie']->movie_distributor }}</span>
                            </div>

                            <div class="release-date-group">
                                <label><b>Movie Release Date: </b></label>
                                <span>{{ $data['movie']->release_date }}</span>
                            </div>

                            <div class="screen-to-from-group">
                                <label><b>Movie Screen from/to: </b></label>
                                <span>{{ $data['movie']->screen_from_date }} to {{$data['movie']->screen_until_date }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="display-bottom">
                        <div class="cast-group">
                            <label><b>Movie Cast: </b></label>
                            <br><span>{{ $data['movie']->movie_cast }}</span>
                        </div>

                        <div class="synopsis-group">
                            <br><label><b>Movie Synopsis: </b></label>
                            <br><span>{{ $data['movie']->movie_synopsis }}</span>
                        </div>
                    </div>

                    <div class="cover-photo-group">
                        <label><b>Movie Cover Photo: </b></label>
                        <br><span><img class= "cover-photo" src="{{ route('movie.cover.photo', $data['movie']->movie_id) }}"
                                alt="{{ $data['movie']->movie_name }}"></span>
                    </div>
                </div>
            @else
                {!! $data['maintenance'] !!}
            @endif

            <div id=section2-2>

                <a href="{{ route('hallTimeSlot', ['date' => $data['date']]) }}"
                    class="btn focus:outline-none text-center text-white bg-red-600 hover:bg-red-700 focus:ring-4font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    Back</a>

                <form action="{{ route('hallTimeSlot.delete', ['hallTimeSlotID' => $data['hallTimeSlot']->hall_time_slot_id]) }}"
                    method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class=" {{$data['deleteBtnStatus']== 'disable' ? 'disabledBtn' : '' }} btn focus:outline-none text-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        Delete
                    </button>
                </form>
            </div>
        </div>

    </div>

@endsection

<!-- all js for this page -->
@push('scripts')
@endpush
