<?php
namespace App\Factory\HallFactory\HallConcreteProduct;

use App\Factory\HallFactory\HallInterface;
use App\Factory\HallFactory\SeatCreator;

class PremiumHallConcreteProduct implements HallInterface {
    private $hallID, $hallName;
    const HALL_TYPE = "Premium";
    const ROWS = 5;
    const COLUMNS = 10;
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