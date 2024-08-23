<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MovieController extends Controller
{
        private static $movNum;
        private static $lastCreationDate;

        public function index()
        {
            $movies = Movie::all();
            return view('admin.manageMovie.index', compact('movies'));
        }
    
        public function create()
        {
            $movieID =  $this->generateMovieID();
            return view('admin.manageMovie.create', compact('movieID'));
        }
    
        public function store(Request $request)
        {
            $validated = $request->validate([
                'movieID' => 'required|string',
                'movieName' => 'required|string',
                'movieGenre' => 'required|string',
                'movieLanguage' => 'required|string',
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
    
            // Process file uploads
            $moviePoster = null;
        if ($request->hasFile('moviePoster')) {
            $moviePoster = file_get_contents($request->file('moviePoster')->getRealPath());
        }

        $movieCoverPhoto = null;
        if ($request->hasFile('movieCoverPhoto')) {
            $movieCoverPhoto = file_get_contents($request->file('movieCoverPhoto')->getRealPath());
        }
    
            // Create a new movie record
            Movie::create([
                'movieID' => $validated['movieID'],
                'movieName' => $validated['movieName'],
                'movieSynopsis' => $validated['movieSynopsis'],
                'movieGenre' => $validated['movieGenre'],
                'movieSubtitle' => $validated['movieSubtitle'],
                'movieLanguage' => $validated['movieLanguage'],
                'movieDuration' => $validated['movieDuration'],
                'movieDistributor' => $validated['movieDistributor'],
                'movieCast' => $validated['movieCast'],
                'releaseDate' => $validated['releaseDate'],
                'screenFromDate' => $validated['screen-from'],
                'screenUntilDate' => $validated['screen-until'],
                'moviePoster' => $moviePoster,
                'movieCoverPhoto' => $movieCoverPhoto,
            ]);
    
            // Flash a success message and redirect to index
            return redirect()->route('movies.index')->with('success', 'Movie added successfully!');
        }

        
    
        public function edit($id)
        {
            // $movie = Movie::findOrFail($id);
            // return view('admin.manageMovie.edit', compact('movie'));
        }
    
        public function update(Request $request, $id)
        {
            // $validatedData = $request->validate([
            //     // Add validation for fields as necessary
            // ]);
    
            // $movie = Movie::findOrFail($id);
            // $movie->update($validatedData);
    
            // return redirect()->route('movies.index');
        }
    
        public function show($id)
        {
            // $movie = Movie::findOrFail($id);
            // return view('movies.show', compact('movie'));
        }


        private function generateMovieID(){
            $currentDate = Carbon::now();

            if (self::$lastCreationDate === null || 
            self::$lastCreationDate->year < $currentDate->year){
                self::$movNum = 1;
            }else{
                self::$movNum++;
            }

            $uniqueID = sprintf("MOV-%s-%06d", $currentDate->toDateString(), self::$movNum);
            self::$lastCreationDate = $currentDate;

            return $uniqueID;
        }
    
}
