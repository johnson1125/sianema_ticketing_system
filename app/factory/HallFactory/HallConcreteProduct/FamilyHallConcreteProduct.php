<?php
namespace App\Factory\HallFactory\HallConcreteProduct;
use App\Factory\HallFactory\HallInterface;
use App\Factory\HallFactory\SeatCreator;

class FamilyHallConcreteProduct implements HallInterface {
    private $hallID, $hallName;
    const HALL_TYPE = "Family";
    const ROWS = 5;
    const COLUMNS = 1;
    private $seatCreator;


    public function __construct(string $hallID, string $hallName, SeatCreator $seatCreator) {
        $this->seatCreator = $seatCreator;
        $this->hallID = $hallID;
        $this->hallName = $hallName;
    }

    public function createSeats(): void {
        $this->seatCreator->createSeats($this->hallID, self::ROWS, self::COLUMNS);
    }

    public function getHallID(): string {
        return $this->hallID;
    }

    public function getHallName(): string {
        return $this->hallName;
    }

    public function getColumns(): int{
        return self::COLUMNS;
    }

    public function getRows(): int{
        return self::ROWS;
    }
}