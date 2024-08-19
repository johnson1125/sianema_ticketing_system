<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hall extends Model
{
    use HasFactory;


    public function seats(): HasMany
    {
        return $this->hasMany(Seat::class);
    }

    public function hallTimeSlot(): HasMany
    {
        return $this->hasMany(HallTimeSlot::class);
    }
}
