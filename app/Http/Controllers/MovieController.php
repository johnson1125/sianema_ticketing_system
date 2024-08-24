<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MovieController extends Controller
{
        public function index()
        {
            $movies = Movie::all();
            return view('admin.manageMovie.index', compact('movies'));
        }
    
        public function create()
        {
            $movie_id =  $this->generateMovieID();
            return view('admin.manageMovie.create', compact('movie_id'));
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

            $releaseDate = Carbon::createFromFormat('m/d/Y', $validated['releaseDate'])->format('Y-m-d');
            $screenFromDate = Carbon::createFromFormat('m/d/Y', $validated['screen-from'])->format('Y-m-d');
            $screenUntilDate = Carbon::createFromFormat('m/d/Y', $validated['screen-until'])->format('Y-m-d');

            // Process file uploads
            $moviePoster = $request->hasFile('moviePoster') ? file_get_contents($request->file('moviePoster')->getRealPath()) : null;
            $movieCoverPhoto = $request->hasFile('movieCoverPhoto') ? file_get_contents($request->file('movieCoverPhoto')->getRealPath()) : null;
            

            // Debug log statements
            // Log::info('Movie Poster: ' . ($moviePoster ? 'Uploaded' : 'Not Uploaded'));
            // Log::info('Movie Cover Photo: ' . ($movieCoverPhoto ? 'Uploaded' : 'Not Uploaded'));

            // Create a new movie record
            Movie::create([
                'movie_id' => $validated['movieID'],
                'movie_name' => $validated['movieName'],
                'movie_synopsis' => $validated['movieSynopsis'],
                'movie_genre' => $validated['movieGenre'],
                'movie_subtitle' => $validated['movieSubtitle'],
                'movie_language' => $validated['movieLanguage'],
                'movie_duration' => $validated['movieDuration'],
                'movie_distributor' => $validated['movieDistributor'],
                'movie_cast' => $validated['movieCast'],
                'release_date' => $releaseDate,
                'screen_from_date' => $screenFromDate,
                'screen_until_date' => $screenUntilDate,
                'movie_poster' => $moviePoster,
                'movie_cover_photo' => $movieCoverPhoto,
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


        private function generateMovieID()
        {
            $currentDate = Carbon::now();
            $formattedDate = $currentDate->format('Y-m-d'); // Format: YYYY-MM-DD

            // Retrieve the latest movie record for the current year
            $latestMovie = Movie::whereYear('created_at', $currentDate->year)
                                ->orderBy('created_at', 'desc')
                                ->first();

            // Extract the latest movie number from the latest movie ID if available
            if ($latestMovie) {
                // Assuming movieID format: MOV-YYYY-MM-DD-XXXXXX
                $latestMovNum = (int) substr($latestMovie->movie_id, -6); // Extract the last 6 digits and convert to integer
            } else {
                $latestMovNum = 0; // Start with 0 if no previous records
            }

            // Increment the movie number
            $newMovNum = $latestMovNum + 1;

            // Format the new movie number with leading zeros (6 digits)
            $formattedMovNum = sprintf("%06d", $newMovNum);

            // Create the unique ID
            $uniqueID = sprintf("MOV-%s-%s", $formattedDate, $formattedMovNum);

            return $uniqueID;
        }
}
