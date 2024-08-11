<?php

namespace App\Http\Controllers;

use App\Models\SampleMovie;
use Illuminate\Http\Request;

class SampleMovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = SampleMovie::all();
        return view('sampleMovies.index', compact('movies'));
    }

    public function create()
    {
        return view('sampleMovies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'director' => 'required',
            'release_date' => 'required|date',
        ]);

        SampleMovie::create($request->all());
        return redirect()->route('movies.index')->with('success', 'Movie created successfully.');
    }

    public function show(SampleMovie $movie)
    {
        return view('sampleMovies.show', compact('movie'));
    }

    public function edit(SampleMovie $movie)
    {
        return view('sampleMovies.edit', compact('movie'));
    }

    public function update(Request $request, SampleMovie $movie)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'director' => 'required',
            'release_date' => 'required|date',
        ]);

        $movie->update($request->all());
        return redirect()->route('movies.index')->with('success', 'Movie updated successfully.');
    }

    public function destroy(SampleMovie $movie)
    {
        $movie->delete();
        return redirect()->route('movies.index')->with('success', 'Movie deleted successfully.');
    }
}
