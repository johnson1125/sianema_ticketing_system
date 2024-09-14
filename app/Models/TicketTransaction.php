<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TicketTransaction extends Model
{
    use HasFactory;

    protected $table = 'ticket_transactions';

    protected $primaryKey = 'ticket_transaction_id';
    
    public $incrementing = false;
    
    protected $keyType = 'string';

    // Add the columns that are mass assignable
    protected $fillable = [
        'ticket_transaction_id', // Include this only if it's not auto-incrementing
        'custID',
        'transactionDateTime',
        'transactionAmount',
        'transactionStatus',
    ];

    public function movieSeats(): HasMany
    {
        return $this->hasMany(movieSeat::class);
    }

    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }
}
