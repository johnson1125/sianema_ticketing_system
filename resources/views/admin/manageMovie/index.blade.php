@vite(['resources/css/admin/manageMovie/index.css'])
<x-admin-Layout>
    <div class="container">
        <div class="header-container">
            <h1 class="pageTitle">Manage Movie</h1>
            <div class="text-end mb-3">
                <button class="btn" onClick="location.href='{{ route('movies.create') }}';"> Add Movie </button>
            </div>
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
            <tbody>
                @foreach ($movies as $movie)
                    <tr>
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
</x-admin-Layout>
