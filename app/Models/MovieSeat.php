<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MovieSeat extends Model
{
    use HasFactory;

    protected $primaryKey = 'movie_seat_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'movie_seat_id',
        'ticket_transaction_id',
        'hall_time_slot_id',
        'seat_id',
        'movie_seats_status',
    ];


    public function ticket(): BelongsTo
    {
        return $this->belongsTo(Ticket::class);
    }
    public function seat(): BelongsTo
    {
        return $this->belongsTo(Seat::class);
    }
    public function hallTimeSlot(): BelongsTo
    {
        return $this->belongsTo(HallTimeSlot::class);
    }

    public static function getSeatByTimeSlotId($timeSlotID)
    {
        return MovieSeat::where('hall_time_slot_id', $timeSlotID)
        ->get();
    }
}

