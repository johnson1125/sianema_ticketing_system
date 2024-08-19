<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TicketTransaction extends Model
{
    use HasFactory;

    public function movieSeats(): HasMany
    {
        return $this->hasMany(movieSeat::class);
    }

    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }
}
