<?php
namespace App\Services;
use App\Models\Seat;
use App\Models\Hall;
use App\Models\MovieSeat;

// Author: Sia Yeong Sheng

class SeatService {
    public function createSeats(string $hallID, int $rowNum, int $columnNum): void {
        // Check if the hall ID already exists in the seats database
        $existingSeat = Seat::where('hall_id', $hallID)->first();
        $type = "";
        switch(substr($hallID, 5, 1)){
            case 'S':
                $type = "Standard";
                break;
            case 'P':
                $type = "Premium";
                break;
            case 'F':
                $type = "Family";
                break;
            default:
                $type = "Error type";
                break;
        }
        $rowCounter = 1;
        while($rowCounter <= $rowNum){
            $columnCounter = 1;
            while ($columnCounter <= $columnNum){
                $seatID = $this->generateSeatID($hallID, $rowCounter, $columnCounter);             
                Seat::create([
                    'seat_id' => $seatID,
                    'hall_id' => $hallID,
                    'row_letter' => $this->getRowLetter($rowCounter),
                    'column_number' => $columnCounter,
                    'seat_type' => $type, 
                    'status' => 'open',
                ]);
                ++$columnCounter;
            }
            ++$rowCounter;
        }
        
    }

    public function updateSeatStatuses(array $seatStatuses): bool
    {   
        //time when the update seat operation is being called.
        $currentDateTime = new \DateTime();
       
        foreach ($seatStatuses as $seatId => $status) {
            // Process each seat ID and status
            $seat = Seat::find($seatId);
            if ($seat) {
                $seat->status = $status;
                $seat->save();

                $affectedMovieSeats = MovieSeat::where('seat_id', $seatId)->get(); //since we have seat_id in movie_seat 
                //find all the movieseat with the matched seat_id
                // extract the datetime from the movie_seat_id and compare if the datetime is >= the operation date time
                // if yes then change the current movie seat status base on current seat status
                foreach ($affectedMovieSeats as $movieSeat){
                    $extractDateTime = substr($movieSeat->movie_seat_id, 10, 12);  //HALL-F-01-240913-10-00-A01
                    $seatDateTime = \DateTime::createFromFormat('ymd-H-i', $extractDateTime);              
                    if ($seatDateTime >= $currentDateTime) {
                        // Check the new seat status and update the movie seat status accordingly
                        if ($status === 'occupied' && $movieSeat->movie_seats_status === 'Available') {
                            $movieSeat->movie_seats_status = 'Occupied';
                            $movieSeat->save();
                        } elseif ($status === 'open' && $movieSeat->movie_seats_status === 'Occupied') {
                            $movieSeat->movie_seats_status = 'Available';
                            $movieSeat->save();
                        }
                    }
                }


            } else {
                throw new \Exception('Seat not found: ' . $seatId);
            }
        }
        
        return true;
    }

    private function generateSeatID(string $hallID, int $rowNum, int $columnNum): string {
        $rowLetter = $this->getRowLetter($rowNum);
        $columnNumber = str_pad($columnNum, 2, '0', STR_PAD_LEFT);
        return sprintf('%s-%s%s', $hallID, $rowLetter, $columnNumber);
    }

    private function getRowLetter(int $rowNum): string {
        $letters = range('A', 'J'); 
        return $letters[$rowNum - 1];
    }
}