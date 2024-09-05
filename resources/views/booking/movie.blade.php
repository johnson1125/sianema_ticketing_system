<!-- using the master page layout -->
@extends('layouts.master')

<!-- The title for this page -->
@section('title', 'Movie')

<!-- all css for this page -->
@push('styles')
    @vite(['resources/css/booking/movie.css'])
@endpush

<!-- html for this page -->
@section('content')
    <div id="container">

        <h1 class="mb-4 text-3xl font-extrabold text-gray-200 dark:text-white md:text-5xl lg:text-6xl"><span
                class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">Now</span>
            Showing</h1>

        <div class="movie-row">
            @foreach ($movies as $movie)
                <div class="card view">
                    <img id="moviePoster" src="{{ route('movie.posterPhoto', $movie->movie_id) }}">
                    <div class="mask">
                        <div class="col">
                            <ul class="deco">
                                <li>
                                    <p class="movie-name">{{ $movie->movie_name }}</p>
                                </li>
                                <li>
                                    <a href="{{ route('movies.details', ['movie_id' => $movie->movie_id]) }}"
                                        class="btn-book-now">Book
                                        Now</a>
                                </li>
                                <li><br /></li>
                                <li>
                                    <a href="{{ route('movies.details', ['movie_id' => $movie->movie_id]) }}"
                                        class="btn-more-info">More
                                        Info</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>



    </div>
@endsection

<!-- all js for this page -->
@push('scripts')
    {{-- @vite(['']) --}}
@endpush
