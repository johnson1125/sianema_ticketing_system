@vite(['resources/css/booking/movie.css'])
<x-app-layout>

    <div id="container">

        <h1 class="mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl"><span
                class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">Now</span>
            Showing</h1>

            @foreach ($movies as $movie)
            <div class="card view">
                <!--img id="moviePoster" Height="400" Width="300" src="" alt="Movie Poster"/> -->
                <div class="mask">
                    <div class="col">
                        <ul class="deco">
                            <li>
                                <p class="movie-name">
                                    {{ $movie->title }}
                                </p>
                            </li>
                            <li><a href="{{ route('movies.details', ['id' => $movie->id]) }}" class="btn-book-now">Book Now</a></li>
                            <li>
                                <br />
                            </li>
                            <li><a href="{{ route('movies.details', ['id' => $movie->id]) }}" class="btn-more-info">More Info</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
            

    </div>
</x-app-layout>
