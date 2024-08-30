@vite(['resources/css/admin/manageMovie/show.css'])

<x-admin-Layout>
    <h1 class="pageTitle">View Movie</h1>
    <div class="container">
        <div class="cover-photo-group">
            <label><b>Movie Cover Photo: </b></label>
            <br><span><img class= "cover-photo" src="{{ route('movie.cover.photo', $movie->movie_id) }}"
                    alt="{{ $movie->movie_name }}"></span>
        </div>

        <div class="flex-container">
        <div class="display-top-left">
            <div class="poster-group">
                <label><b>Movie Poster: </b></label>
                <br><span><img class= "poster" src="{{ route('movie.poster', $movie->movie_id) }}"
                        alt="{{ $movie->movie_name }}"></span>
            </div>


        </div>
        <div class="display-top-right">
            <div class="id-group">
                <label><b>Movie ID: </b></label>
                <span>{{ $movie->movie_id }}</span>
            </div>

            <div class="name-group">
                <label><b>Movie Name: </b></label>
                <span>{{ $movie->movie_name }}</span>
            </div>

            <div class="genre-group">
                <label><b>Movie Genre: </b></label>
                <span>{{ $movie->movie_genre }}</span>
            </div>

            <div class="language-group">
                <label><b>Movie Language: </b></label>
                <span>{{ $movie->movie_language }}</span>
            </div>

            <div class="subtitle-group">
                <label><b>Movie Subtitle: </b></label>
                <span>{{ $movie->movie_subtitle }}</span>
            </div>

            <div class="duration-group">
                <label><b>Movie Duration: </b></label>
                <span>{{ $movie->movie_duration }}</span>
            </div>

            <div class="distributor-group">
                <label><b>Movie Distributor: </b></label>
                <span>{{ $movie->movie_distributor }}</span>
            </div>

            <div class="release-date-group">
                <label><b>Movie Release Date: </b></label>
                <span>{{ $movie->release_date }}</span>
            </div>

            <div class="screen-to-from-group">
                <label><b>Movie Screen from/to: </b></label>
                <span>{{ $movie->screen_from_date }} to {{ $movie->screen_until_date }}</span>
            </div>
        </div>
        </div>


        <div class="display-bottom">
            <div class="cast-group">
                <label><b>Movie Cast: </b></label>
                <br><span>{{ $movie->movie_cast }}</span>
            </div>

            <div class="synopsis-group">
                <br><label><b>Movie Synopsis: </b></label>
                <br><span>{{ $movie->movie_synopsis }}</span>
            </div>
        </div>
    </div>

    <button class="btn" onClick="location.href='{{ route('movies.index') }}';">Return</button>

    
</x-admin-Layout>
