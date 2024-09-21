<?php

namespace App\Observers;

use App\Models\TicketTransaction;
use App\Models\MovieSeat;
use App\Models\Ticket;

// Author: Kho Ka Jie
class TicketTransactionObserver
{
    /**
     * Handle the TicketTransaction "created" event.
     */
    public function created(TicketTransaction $ticketTransaction): void
    {
        //
    }

    /**
     * Handle the TicketTransaction "updated" event.
     */
    public function updated(TicketTransaction $ticketTransaction): void
    {
        if ($ticketTransaction->transactionStatus === 'Completed') {

            $this->updateMovieSeatStatus($ticketTransaction);
            $this->createTicket($ticketTransaction);
        }
    }


    public function deleted(TicketTransaction $ticketTransaction): void
    {
        //
    }

    public function restored(TicketTransaction $ticketTransaction): void
    {
        //
    }

    public function forceDeleted(TicketTransaction $ticketTransaction): void
    {
        //
    }


    protected function sendTransactionEmail(TicketTransaction $transaction)
    {
        $customerEmail = $transaction->user->email;  // Assuming user is related to TicketTransaction

        Mail::raw("Your ticket purchase is complete! Transaction ID: {$transaction->ticket_transaction_id}", function ($message) use ($customerEmail) {
            $message->to($customerEmail)
                ->subject('Ticket Purchase Completed');
        });
    }

    protected function updateMovieSeatStatus(TicketTransaction $transaction)
    {
        $selectedSeats = $transaction->getSelectedSeats();

        $selectedSeatsArray = explode('%2C', $selectedSeats);

        foreach ($selectedSeatsArray as $seatId) {

            $seatId = trim($seatId);
            $seat = MovieSeat::find($seatId);
            if ($seat) {
                $seat->movie_seats_status = 'Sold'; 
                $seat->save();
            }
        }
    }

    protected function createTicket(TicketTransaction $transaction)
    {
        $selectedSeats = $transaction->getSelectedSeats();

        $selectedSeatsArray = explode('%2C', $selectedSeats);
        $prices = [
            'F' => 50.00, // Family
            'S' => 15.00, // Standard
            'P' => 30.00  // Premium
        ];
        foreach ($selectedSeatsArray as $seatId) {
            $seatId = trim($seatId);
            $ticketId = 'TIC-' . $seatId;
            $seatType = $this->getSeatTypeFromId($seatId); 
            $price = isset($prices[$seatType]) ? $prices[$seatType] : 0.00;

            // Create ticket record
            Ticket::create([
                'ticket_id' => $ticketId,
                'movie_seat_id' => $seatId,
                'ticket_price' => $price,
                'ticket_transaction_id' => $transaction->ticket_transaction_id,
            ]);
        }
    }

    protected function getSeatTypeFromId($seatId)
{
    $parts = explode('-', $seatId);
    if (isset($parts[1])) {
        $seatType = $parts[1];
        if (in_array($seatType, ['F', 'S', 'P'])) {
            return $seatType;
        }
    }
}

}
