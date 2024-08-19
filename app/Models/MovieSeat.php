<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MovieSeat extends Model
{
    use HasFactory;
    public function ticketTransaction(): BelongsTo
    {
        return $this->belongsTo(TicketTransaction::class);
    }
    public function seat(): BelongsTo
    {
        return $this->belongsTo(Seat::class);
    }
    public function hallTimeSlot(): BelongsTo
    {
        return $this->belongsTo(HallTimeSlot::class);
    }
}

