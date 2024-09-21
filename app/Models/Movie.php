<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory;

    protected $primaryKey = 'movie_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'movie_id',
        'movie_name',
        'movie_synopsis',
        'movie_genre',
        'movie_subtitle',
        'movie_language',
        'movie_duration',
        'movie_distributor',
        'movie_cast',
        'release_date',
        'screen_from_date',
        'screen_until_date',
        'movie_poster',
        'movie_cover_photo'
    ];

    public function halltimeSlot(): HasMany
    {
        return $this->hasMany(HallTimeSlot::class);
    }

    public static function getOnScreenMovies()
    {
        return Movie::whereDate('screen_from_date', '<=', Carbon::today())
            ->whereDate('screen_until_date', '>=', Carbon::today())
            ->get();
    }

    public static function getMovieAttributesWithID($movieID, array $attributes)
    {
        // Validate the attributes array to ensure valid columns
        $validAttributes = [
            'movie_id',
            'movie_name',
            'movie_synopsis',
            'movie_genre',
            'movie_subtitle',
            'movie_language',
            'movie_duration',
            'movie_distributor',
            'movie_cast',
            'release_date',
            'screen_from_date',
            'screen_until_date',
            'movie_poster',
            'movie_cover_photo'
        ]; // List of valid attributes

        // Filter the dynamic list to include only valid attributes
        $attributes = array_intersect($attributes, $validAttributes);

        $includeImage = !empty(array_intersect(['movie_poster', 'movie_cover_photo'], $attributes));

        // Query with the selected attributes
        $movie = Movie::select($attributes) // Select specific attributes
            ->where('movie_id', $movieID) // Filter by movie_id
            ->first(); // Fetch the first matching record

        // Modify the result if image needs to be base64 encoded
        // Check if the movie exists before manipulating it
        if ($movie) {
            // Convert the model to an array
            $result = $movie->toArray();

            // If you need to handle image encoding, do it here
            if ($includeImage) {
                if (isset($result['movie_poster'])) {
                    $result['movie_poster_base64'] = base64_encode($result['movie_poster']);
                    unset($result['movie_poster']); // Optionally remove raw movie_poster data
                }

                if (isset($result['movie_cover_photo'])) {
                    $result['movie_cover_photo_base64'] = base64_encode($result['movie_cover_photo']);
                    unset($result['movie_cover_photo']); // Optionally remove raw movie_cover_photo data
                }
            }
        } else {
            $result = null; // Handle the case where the movie is not found
        }

        // Return or use the result
        return $result;
    }

}
