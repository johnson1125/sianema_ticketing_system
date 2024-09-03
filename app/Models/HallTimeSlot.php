<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HallTimeSlot extends Model
{
    use HasFactory;
    protected $primaryKey = 'hall_id';  // Custom primary key
    public $incrementing = false;    // If the primary key is not an auto-incrementing integer
    protected $keyType = 'string';  

    protected $fillable = [
        'hall_time_slot_id',
        'startDateTime',
        'duration',
        'timeSlotType',
        'hall_id',
        'movie_id',
        'maintenance_id'
    ];
   
    public function hall(): BelongsTo
    {
        return $this->belongsTo(Hall::class);
    }
    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }
    public function movieSeats(): HasMany
    {
        return $this->hasMany(MovieSeat::class);
    }
}
   
