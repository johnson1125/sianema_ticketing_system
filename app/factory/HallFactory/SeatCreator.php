<?php
namespace App\Factory\HallFactory;
use App\Models\Seat;

class SeatCreator {
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