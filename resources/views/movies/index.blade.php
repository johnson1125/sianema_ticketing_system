@extends('layouts.adminLayout')

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h1 class="text-3xl font-bold mb-6">Movies</h1>
            <div class="flex justify-end mb-4">
                <a href="{{ route('movies.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Add Movie
                </a>
            </div>
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 bg-gray-200 text-left text-sm font-semibold text-gray-700">Title</th>
                        <th class="py-2 px-4 bg-gray-200 text-left text-sm font-semibold text-gray-700">Director</th>
                        <th class="py-2 px-4 bg-gray-200 text-left text-sm font-semibold text-gray-700">Release Date</th>
                        <th class="py-2 px-4 bg-gray-200 text-left text-sm font-semibold text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($movies as $movie)
                        <tr class="border-t">
                            <td class="py-2 px-4 text-sm text-gray-600">{{ $movie->title }}</td>
                            <td class="py-2 px-4 text-sm text-gray-600">{{ $movie->director }}</td>
                            <td class="py-2 px-4 text-sm text-gray-600">{{ $movie->release_date }}</td>
                            <td class="py-2 px-4 text-sm text-gray-600">
                                <a href="{{ route('movies.edit', $movie->id) }}" class="text-blue-500 hover:text-blue-700 mr-4">Edit</a>
                                <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                   
                </tbody>
            </table>
        </div>
        <button id="testBtn" class="bg-blue-400">Testing</button>
         @vite('resources/js/app.js')
    @endsection
