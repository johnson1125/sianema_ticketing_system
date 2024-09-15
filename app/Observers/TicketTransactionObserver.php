<?php

namespace App\Observers;

use App\Models\TicketTransaction;
use App\Models\MovieSeat;
use App\Models\Ticket;

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
        // Check if the transaction status has been updated to "completed"
        if ($ticketTransaction->transactionStatus === 'Completed') {
            // Send an email to the customer
            //$this->sendTransactionEmail($ticketTransaction);

            // Update the movie seat status
            $this->updateMovieSeatStatus($ticketTransaction);

            $this->createTicket($ticketTransaction);
        }
    }

    /**
     * Handle the TicketTransaction "deleted" event.
     */
    public function deleted(TicketTransaction $ticketTransaction): void
    {
        //
    }

    /**
     * Handle the TicketTransaction "restored" event.
     */
    public function restored(TicketTransaction $ticketTransaction): void
    {
        //
    }

    /**
     * Handle the TicketTransaction "force deleted" event.
     */
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
            // Trim any extra whitespace from seat IDs
            $seatId = trim($seatId);

            // Find the seat by ID
            $seat = MovieSeat::find($seatId);

            // If the seat exists, update its status
            if ($seat) {
                $seat->movie_seats_status = 'Sold';  // Update seat status to sold
                $seat->save();
            }
        }
    }

    protected function createTicket(TicketTransaction $transaction)
    {
        $selectedSeats = $transaction->getSelectedSeats();

        $selectedSeatsArray = explode('%2C', $selectedSeats);

        // Define seat prices
        $prices = [
            'F' => 50.00, // Family
            'S' => 15.00, // Standard
            'P' => 30.00  // Premium
        ];

        // Assume you have a function to get the seat type from seatId
        foreach ($selectedSeatsArray as $seatId) {
            $seatId = trim($seatId);

            // Generate ticket ID
            $ticketId = 'TIC-' . $seatId;

            // Get seat type and price
            $seatType = $this->getSeatTypeFromId($seatId); // Implement this function based on your logic
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
    // Split the seatId by hyphens
    $parts = explode('-', $seatId);

    // Check if there are enough parts and the second part contains the seat type
    if (isset($parts[1])) {
        // Extract the seat type from the second part
        $seatType = $parts[1];

        // Return the seat type if it matches F, S, or P
        if (in_array($seatType, ['F', 'S', 'P'])) {
            return $seatType;
        }
    }
}

}
