<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles; // Spatie Laravel-Permission
    use HasFactory, Notifiable;

    public $incrementing = false;
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->id = self::generateCustomId();
        });
    }

    private static function generateCustomId()
    {
        // Get the current date in the required format
        $currentDate = now()->format('Y-m-d'); // e.g., "2024-09-21"

        // Find the latest user ID created today
        $latestUserId = self::where('id', 'like', 'USR-' . $currentDate . '%')
            ->orderBy('id', 'desc')
            ->first()->id ?? null;

        // Extract the sequence number or start with 1 if none found
        if ($latestUserId) {
            $number = intval(substr($latestUserId, -6)) + 1; // Get the number after the last dash
        } else {
            $number = 1; // Start from 1 if no previous ID is found
        }

        // Format the number to be 6 digits with leading zeros
        $formattedNumber = str_pad($number, 6, '0', STR_PAD_LEFT);

        return 'USR-' . $currentDate . '-' . $formattedNumber; // Generate new custom ID
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_photo',
        'mobile_number',
        'date_of_birth',
    ];

    /**
     * The attributes that are not mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'isRoot',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function ticketTransaction(): HasMany
    {
        return $this->hasMany(TicketTransaction::class);
    }

    
}
