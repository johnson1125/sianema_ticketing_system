@extends('layouts.movieLayout')

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h1 class="text-3xl font-bold mb-6">{{ $movie->title }}</h1>
            <div class="mb-4">
                <h2 class="text-xl font-semibold">Description:</h2>
                <p class="text-gray-700">{{ $movie->description }}</p>
            </div>
            <div class="mb-4">
                <h2 class="text-xl font-semibold">Director:</h2>
                <p class="text-gray-700">{{ $movie->director }}</p>
            </div>
            <div class="mb-4">
                <h2 class="text-xl font-semibold">Release Date:</h2>
                <p class="text-gray-700">{{ $movie->release_date }}</p>
            </div>
            <div class="flex items-center justify-between">
                <a href="{{ route('movies.edit', $movie->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Edit
                </a>
                <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        Delete
                    </button>
                </form>
                <a href="{{ route('movies.index') }}" class="text-gray-500 hover:text-gray-700">Back to List</a>
            </
