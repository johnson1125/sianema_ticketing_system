<?php

namespace App\Models;

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
        'movieName',
        'movieSynopsis',
        'movieGenre',
        'movieSubtitle',
        'movieLanguage',
        'movieDuration',
        'movieDistributor',
        'movieCast',
        'releaseDate',
        'screenFromDate',
        'screenUntilDate',
    ];

    protected $casts = [
        'moviePoster' => 'binary',
        'movieCoverPhoto' => 'binary',
    ];

    public function halltimeSlot(): HasMany
    {
        return $this->hasMany(HallTimeSlot::class);
    }
}
