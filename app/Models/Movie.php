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
    ];

    protected $casts = [
        'movie_poster' => 'binary',
        'movie_cover_photo' => 'binary',
    ];

    public function halltimeSlot(): HasMany
    {
        return $this->hasMany(HallTimeSlot::class);
    }
}
