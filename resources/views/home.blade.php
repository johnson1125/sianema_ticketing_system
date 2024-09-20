<!-- using the master page layout -->
@extends('layouts.master')

<!-- The title for this page -->
@section('title', 'Home')

<!-- all css for this page -->
@push('styles')
@vite(['resources/css/home.css'])
@endpush

<!-- html for this page -->
@section('content')

<!-- hero slider start -->
<div id="gallery" class="relative w-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
        <!-- Item 1 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
            <img src="{{ asset('images/ad1.png') }}" class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="">
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ asset('images/ad2.png') }}" class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="">
        </div>
        <!-- Item 3 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ asset('images/ad3.png') }}" class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="">
        </div>
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>
<!-- hero slider end -->

<!-- showing now slider start -->

<section class="showing-now homepage-container">
    <div class="slider-header mb-3">
        <div class="slider-title">
            <h3>Showing Now</h3>
        </div>
        <div class="btn-group">
            <button class="btn btn-primary mb-3 mr-1" id="prevBtn" href="carouselExampleIndicators2" data-slide="prev">
                <i class="fa fa-arrow-left"></i>
            </button>
            <button class="btn btn-primary mb-3" id="nextBtn" href="carouselExampleIndicators2" data-slide="next">
                <i class="fa fa-arrow-right"></i>
            </button>
        </div>
    </div>

    <div class="showing-now-slider">
        @foreach ($movies as $movie)
        <div class="movie-card card view">
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
</section>

<!-- showing now slider end -->


@endsection

<!-- all js for this page -->
@push('scripts')
@vite(['resources/js/home.js'])
@endpush