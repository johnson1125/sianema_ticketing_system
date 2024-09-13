<?php
namespace App\Factories\HallFactory\HallConcreteProduct;

use App\Factories\HallFactory\HallInterface;
use App\Services\SeatService;

class StandardHallConcreteProduct implements HallInterface {
    private $hallID, $hallName;
    const HALL_TYPE = "Standard";
    const ROWS = 10;
    const COLUMNS = 12;
    private $seatCreator;

    public function __construct(string $hallID, string $hallName, SeatService $seatCreator) {
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