<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// Author: Kho Ka Jie
class Ticket extends Model
{
    use HasFactory;

    
    protected $table = 'tickets';

    protected $primaryKey = 'ticket_id';
    
    public $incrementing = false;
    
    protected $keyType = 'string';

    // Add the columns that are mass assignable
    protected $fillable = [
        'ticket_id',
        'movie_seat_id',
        'ticket_price',
        'ticket_transaction_id',
    ];

    public function ticketTransaction(): BelongsTo
    {
        return $this->belongsTo(TicketTransaction::class);
    }
}
