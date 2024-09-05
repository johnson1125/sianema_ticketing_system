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
            // $movies = Movie::where('screen_until_date', '>=', now())->get();
            return view('admin.manageMovie.index', compact('movies'));
        }
    
        public function create()
        {
            $movie_id =  $this->generateMovieID();

            $movie_genres = [
                ['type' => 'Action', 'name' => 'Action'],
                ['type' => 'Adventure', 'name' => 'Adventure'],
                ['type' => 'Horror', 'name' => 'Horror'],
                ['type' => 'Romance', 'name' => 'Romance'],
                ['type' => 'Science-Fi', 'name' => 'Science-Fi'],
            ];

            $movie_languages = [
                ['lang' => 'ML(BM)', 'name' => 'Malay Lanaguge'],
                ['lang' => 'CN', 'name' => 'Chinese Language'],
                ['lang' => 'ENG', 'name' => 'English Language'],
                ['lang' => 'TML', 'name' => 'Tamil Language']
            ];

            $movie_subtitles = [
                ['sub' => 'ML(BM)', 'name' => 'Malay Lanaguge'],
                ['sub' => 'CN', 'name' => 'Chinese Language'],
                ['sub' => 'ENG', 'name' => 'English Language'],
                ['sub' => 'TML', 'name' => 'Tamil Language']
            ];

            return view('admin.manageMovie.create', compact('movie_id', 'movie_genres', 'movie_languages'
            ,'movie_subtitles'));
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

          

            $releaseDate = Carbon::createFromFormat('m/d/Y', $validated['releaseDate'])->format('Y-m-d');
            $screenFromDate = Carbon::createFromFormat('m/d/Y', $validated['screen-from'])->format('Y-m-d');
            $screenUntilDate = Carbon::createFromFormat('m/d/Y', $validated['screen-until'])->format('Y-m-d');

            $moviePoster = $request->file('moviePoster')->getContent();
            $movieCoverPhoto = $request->file('movieCoverPhoto')->getContent();
            
            $movieLanguage = $validated['movieLanguage'] === 'other' && !empty($request->input('customLanguage')) 
            ? $request->input('customLanguage') 
            : $validated['movieLanguage'];

            // Create a new movie record
            Movie::create([
                'movie_id' => $validated['movieID'],
                'movie_name' => $validated['movieName'],
                'movie_synopsis' => $validated['movieSynopsis'],
                'movie_genre' => $validated['movieGenre'],
                'movie_subtitle' => $validated['movieSubtitle'],
                'movie_language' => $movieLanguage,
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
            $movie = Movie::findOrFail($id);
            return view('admin.manageMovie.edit', compact('movie'));
        }
    
        public function update(Request $request, $id)
        {   
            $movie = Movie::findOrFail($id);

            $request->validate([
                'movieName' => 'required',
                'movieGenre' => 'required',
                'movieLanguage' => 'required',
                'customLanguage' => 'nullable|string',
                'movieSubtitle' => 'required',
                'movieDistributor' => 'required',
                'releaseDate' => 'required|date',
                'screen-from' => 'required|date',
                'screen-until' => 'required|date',
                'movieDuration' => 'required',
                'movieCast' => 'required',
                'movieSynopsis' => 'required',
            ]);
            
            $movieLanguage = $request->input('movieLanguage') === 'other' && !empty($request->input('customLanguage')) 
            ? $request->input('customLanguage') 
            : $request->input('movieLanguage');

            $movie->movie_name = $request->input('movieName');
            $movie->movie_genre = $request->input('movieGenre');
            $movie->movie_language = $movieLanguage;
            $movie->movie_subtitle = $request->input('movieSubtitle');
            $movie->movie_distributor = $request->input('movieDistributor');
            $movie->release_date = \Carbon\Carbon::parse($request->input('releaseDate'))->format('Y-m-d');
            $movie->screen_from_date = \Carbon\Carbon::parse($request->input('screen-from'))->format('Y-m-d');
            $movie->screen_until_date = \Carbon\Carbon::parse($request->input('screen-until'))->format('Y-m-d');
            $movie->movie_duration = $request->input('movieDuration');
            $movie->movie_cast = $request->input('movieCast');
            $movie->movie_synopsis = $request->input('movieSynopsis');

           
        
            if ($request->hasFile('moviePoster')) {
                $moviePoster = $request->file('moviePoster')->getContent();
                $movie->movie_poster = $moviePoster;
                
            }
        
            if ($request->hasFile('movieCoverPhoto')) {
                $movieCoverPhoto = $request->file('movieCoverPhoto')->getContent();
                $movie->movie_cover_photo = $movieCoverPhoto;
            }

            $movie->save();
        
            return redirect()->route('movies.index')->with('success', 'Movie updated successfully!');
        }
    
        public function show($id)
        {
            $movie = Movie::findOrFail($id);
            return view('admin.manageMovie.show', compact('movie'));
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

        // app/Http/Controllers/MovieController.php

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
            $imageData = $movie->movie_cover_photo;

            return response()->make($imageData, 200)
                ->header('Content-Type', 'image/jpeg');
        }
}


