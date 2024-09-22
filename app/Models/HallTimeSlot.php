<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// Author: Ong Cheng Leong

class HallTimeSlot extends Model
{
    use HasFactory;
    protected $primaryKey = 'hall_time_slot_id';  // Custom primary key
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

    public static function getWithStartDate($date): Collection
    {
        return $hallTimeSlots = HallTimeSlot::whereDate('startDateTime', '=', Carbon::createFromFormat('d-m-Y', $date)->format('Y-m-d'))->get();
    }

    public static function getWithStartDateAndHallID($date, $hallID): Collection
    {
        return $hallTimeSlots = HallTimeSlot::whereDate('startDateTime', '=', Carbon::createFromFormat('d-m-Y', $date)->format('Y-m-d'))
            ->where('hall_id', $hallID)->get();
    }

    public static function getTransactionByIdAndDate($id, $date)
    {

        $selectedDate = Carbon::parse($date)->format('Y-m-d');
        $selectedTime = Carbon::parse($date)->format('H:i:s');

        return HallTimeSlot::join('halls', 'hall_time_slots.hall_id', '=', 'halls.hall_id')
            ->where('hall_time_slots.movie_id', $id)
            ->whereDate('startDateTime', $selectedDate)
            ->whereTime('startDateTime', '>', $selectedTime)
            ->select('hall_time_slots.*', 'halls.hall_type')
            ->orderBy('startDateTime', 'asc')
            ->get();
    }
}

