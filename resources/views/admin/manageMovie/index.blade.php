<!-- Author: Sia Yeong Sheng-->
<!-- using the master page layout -->
@extends('layouts.masterAdmin')

<!-- The title for this page -->
@section('title', 'Manage Movie')
@push('styles')
    @vite(['resources/css/admin/manageMovie/index.css'])
@endpush

@if(session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
@endif
@if(session('error'))
    <script>
        alert("{{ session('error') }}");
    </script>
@endif
@section('content')
    <div class="container">
        <div class="header-container">
            <h1 class="pageTitle">Manage Movie</h1>
            <div class="movie-filter">
                <label style="margin-right: 20px;">
                    <input type="radio" name="movie_filter" value="on-screen" checked>
                    Incoming/On-Screen Movies
                </label>
                <label style="margin-right: 20px;">
                    <input type="radio" name="movie_filter" value="off-screen">
                    Off-Screen Movies
                </label>               
            </div>

            <div class="text-end mb-3">
                <button class="btn" onClick="location.href='{{ route('movies.create') }}';"> Add Movie </button>
            </div>
        </div>

        <div id="page-content">
            <div id="loading-spinner" style="display: flex; justify-content: center; align-items: center; height: 100vh;">
                <p>Loading...</p> <!-- You can use a spinner here as well -->
            </div>

            <table class="manage-movie-table-list">
                <thead>
                    <tr>
                        <th>Poster</th>
                        <th>Name</th>
                        <th>Genre</th>
                        <th>Duration</th>
                        <th>Distributor</th>
                        <th>Screen From</th>
                        <th>Screen Until</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="movie-table-body">
                    @foreach ($movies as $movie)
                        <tr data-screen-until="{{ $movie->screen_until_date }}" class="movie-row">
                            <td><img src="{{ route('movie.poster', $movie->movie_id) }}" alt="{{ $movie->movie_name }}" style="width: 100px; height: auto;"></td>
                            <td>{{ $movie->movie_name }}</td>
                            <td>{{ $movie->movie_genre }}</td>
                            <td>{{ $movie->movie_duration }}</td>
                            <td>{{ $movie->movie_distributor }}</td>
                            <td>{{ $movie->screen_from_date }}</td>
                            <td>{{ $movie->screen_until_date }}</td>
                            <td>
                                <a href="{{ route('movies.show', ['id' => $movie->movie_id]) }}" class="btn">View</a>
                                <a href="{{ route('movies.edit', ['id' => $movie->movie_id]) }}" class="btn">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection

<!-- all js for this page -->
@push('scripts')
    @vite(['resources/js/admin/manageMovie/index.js'])
@endpush
