<?php
namespace App\Services;

use Carbon\Carbon;
use App\Models\Movie;

// Author: Sia Yeong Sheng

class MovieService{
    /**
     * Create a new movie record.
     *
     * @param array $data
     * @return boolean
     */

     public function createMovie(array $data)
     { 
         $movieLanguage = $data['movieLanguage'] === 'other' && !empty($data['customLanguage'])
             ? $data['customLanguage']
             : $data['movieLanguage'];
        
        $moviePoster = $data['moviePoster']->getContent();
        $movieCoverPhoto = $data['movieCoverPhoto']->getContent();     
             
        Movie::create([
             'movie_id' => $data['movieID'],
             'movie_name' => $data['movieName'],
             'movie_synopsis' => $data['movieSynopsis'],
             'movie_genre' => $data['movieGenre'],
             'movie_subtitle' => $data['movieSubtitle'],
             'movie_language' => $movieLanguage,
             'movie_duration' => $data['movieDuration'],
             'movie_distributor' => $data['movieDistributor'],
             'movie_cast' => $data['movieCast'],
             'release_date' => Carbon::createFromFormat('m/d/Y', $data['releaseDate'])->format('Y-m-d'),
             'screen_from_date' => Carbon::createFromFormat('m/d/Y', $data['screen-from'])->format('Y-m-d'),
             'screen_until_date' => Carbon::createFromFormat('m/d/Y', $data['screen-until'])->format('Y-m-d'),
             'movie_poster' => $moviePoster,
             'movie_cover_photo' => $movieCoverPhoto,
         ]);

            try {
                $movie = Movie::findOrFail($data['movieID']);
                return true;
            } catch (ModelNotFoundException $e) {     
                return false;
            }
     }

     /**
     * Edit an existing movie record.
     * @param string $id
     * @param array $data
     * @return boolean
     */
     public function editMovie(array $data, string $id){
        $movie = Movie::findOrFail($id);

        $movieLanguage = $data['movieLanguage'] === 'other' && !empty($data['customLanguage'])
             ? $data['customLanguage']
             : $data['movieLanguage'];

        if (isset($data['moviePoster']) && $data['moviePoster']->isValid()) {
            $moviePoster = $data['moviePoster']->getContent();
            $movie->movie_poster = $moviePoster;
            
        }
    
        if (isset($data['movieCoverPhoto']) && $data['movieCoverPhoto']->isValid()) {
            $movieCoverPhoto = $data['movieCoverPhoto']->getContent();
            $movie->movie_cover_photo = $movieCoverPhoto;
        }

        $movie->movie_name = $data['movieName'];
        $movie->movie_genre = $data['movieGenre'];
        $movie->movie_language = $movieLanguage;
        $movie->movie_subtitle = $data['movieSubtitle'];
        $movie->movie_distributor = $data['movieDistributor'];
        $movie->release_date = \Carbon\Carbon::parse($data['releaseDate'])->format('Y-m-d');
        $movie->screen_from_date = \Carbon\Carbon::parse($data['screen-from'])->format('Y-m-d');
        $movie->screen_until_date = \Carbon\Carbon::parse($data['screen-until'])->format('Y-m-d');
        $movie->movie_duration = $data['movieDuration'];
        $movie->movie_cast = $data['movieCast'];
        $movie->movie_synopsis = $data['movieSynopsis'];   

        return $movie->save();
     }


    public function generateMovieID()
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