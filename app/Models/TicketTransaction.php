<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// Author: Kho Ka Jie
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

    protected $selectedSeats;
    
    public function setSelectedSeats($seats)
    {
        $this->selectedSeats = $seats;
    }

    public function getSelectedSeats()
    {
        return $this->selectedSeats;
    }

    public function ticket(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
