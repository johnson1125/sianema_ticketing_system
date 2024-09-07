<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hall extends Model
{
    use HasFactory;
    protected $table = 'halls';

    protected $primaryKey = 'hall_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'hall_id',
        'hall_name',
        'hall_type',
        'status',
    ];

    protected $casts = [
        'status' => 'string',
    ];
    
    public function seats(): HasMany
    {
        return $this->hasMany(Seat::class);
    }

    public function hallTimeSlot(): HasMany
    {
        return $this->hasMany(HallTimeSlot::class);
    }

    public static function getWithID($hallID){
        return Hall::where('hall_id', $hallID)->first();
    }
}
