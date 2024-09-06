<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Services\MovieService;

class MovieController extends Controller
{

    protected $movieService;

    public function __construct(MovieService $movieService)
    {
        $this->movieService = $movieService;
    }

    public function index()
    {
        $movies = Movie::all();
        return view('admin.manageMovie.index', compact('movies'));
    }

    public function create()
    {
        $movie_id =  $this->movieService->generateMovieID();
        return view('admin.manageMovie.create', compact('movie_id'));
    }

    public function store(Request $request)    
    {
        $validated = $request->validate([
            'movieID' => 'required|string',
            'movieName' => 'required|string',
            'movieGenre' => 'required|string',
            'movieLanguage' => 'required|string',
            'customLanguage' => 'nullable|string',
            'movieSubtitle' => 'required|string',
            'movieDistributor' => 'required|string',
            'movieCast' => 'required|string',
            'movieSynopsis' => 'required|string',
            'releaseDate' => 'required|date|before_or_equal:screen-from',
            'screen-from' => 'required|date|before_or_equal:screen-until',
            'screen-until' => 'required|date|after_or_equal:screen-from',
            'moviePoster' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120', // max 5MB
            'movieCoverPhoto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120', // max 5MB
            'movieDuration' => 'required|string'
        ]);
        
        if($this->movieService->createMovie($validated)){
            return redirect()->route('movies.index')->with('success', 'Movie added successfully!');       
        }
        return redirect()->back()->with('error', 'Failed to add movie!');     
    }

        
    
        public function edit($id)
        {
            $movie = Movie::findOrFail($id);
            return view('admin.manageMovie.edit', compact('movie'));
        }
    
        public function update(Request $request, $id)
        {   
            $validated = $request->validate([
                'movieName' => 'required',
                'movieGenre' => 'required',
                'movieLanguage' => 'required',
                'customLanguage' => 'nullable|string',
                'movieSubtitle' => 'required',
                'movieDistributor' => 'required',
                'releaseDate' => 'required|date',
                'screen-from' => 'required|date',
                'screen-until' => 'required|date',
                'moviePoster' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120', // max 5MB
                'movieCoverPhoto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120', // max 5MB
                'movieDuration' => 'required',
                'movieCast' => 'required',
                'movieSynopsis' => 'required',
            ]); 
            
            if ($this->movieService->editMovie($validated, $id)){
                return redirect()->route('movies.index')->with('success', 'Movie updated successfully!');
            } 
            return redirect()->back()->with('error', 'Failed to update movie!'); 
        }
    
        public function show($id)
        {
            $movie = Movie::findOrFail($id);
            return view('admin.manageMovie.show', compact('movie'));
        }

        public function getMoviePoster($id)
        {
            $movie = Movie::find($id);
            $posterData = $movie->movie_poster;
            return response()->make($posterData, 200)
                ->header('Content-Type', 'image/jpeg');
        }

        public function getMovieCoverPhoto($id)
        {
            $movie = Movie::find($id);
            $coverPhotoData = $movie->movie_cover_photo;
            return response()->make($coverPhotoData, 200)
                ->header('Content-Type', 'image/jpeg');
        }
}


