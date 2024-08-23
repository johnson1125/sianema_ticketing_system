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
                    <th>Image</th>
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
                        <td><img src="{{ asset('storage/' . $movie->moviePoster) }}" alt="{{ $movie->movieName }}"
                                style="width: 100px; height: auto;"></td>
                        <td>{{ $movie->movieName }}</td>
                        <td>{{ $movie->movieGenre }}</td>
                        <td>{{ $movie->movieDuration }}</td>
                        <td>{{ $movie->movieDistributor }}</td>
                        <td>{{ $movie->screenFromDate }}</td>
                        <td>{{ $movie->screenUntilDate }}</td>
                        <td>
                            <a href="{{ route('movies.show', $movie->movie_id) }}" class="btn btn-success">View</a>
                            <a href="{{ route('movies.edit', $movie->movie_id) }}" class="btn btn-success">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin-Layout>
