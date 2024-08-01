@extends('layouts.movieLayout')

@section('content')
<div class="container">
    <h1>Add Movie</h1>
    <form action="{{ route('movies.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div@extends('layouts.app')

        @section('content')
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h1 class="text-3xl font-bold mb-6">Add New Movie</h1>
                    <form action="{{ route('movies.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                            <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                            <textarea name="description" id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="director" class="block text-gray-700 text-sm font-bold mb-2">Director:</label>
                            <input type="text" name="director" id="director" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label for="release_date" class="block text-gray-700 text-sm font-bold mb-2">Release Date:</label>
                            <input type="date" name="release_date" id="release_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Add Movie
                            </button>
                            <a href="{{ route('movies.index') }}" class="text-gray-500 hover:text-gray-700">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        @endsection
        >
        <div class="form-group">
            <label for="director">Director</label>
            <input type="text" name="director" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="release_date">Release Date</label>
            <input type="date" name="release_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Movie</button>
    </form>
</div>
@endsection
