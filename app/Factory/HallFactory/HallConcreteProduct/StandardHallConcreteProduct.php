<?php
namespace App\Factory\HallFactory\HallConcreteProduct;
use App\Factory\HallFactory\HallInterface;
use App\Services\SeatService;

// Author: Sia Yeong Sheng

class StandardHallConcreteProduct implements HallInterface {
    private $hallID, $hallName;
    private const HALL_TYPE = "Standard";
    private const ROWS = 10;
    private const COLUMNS = 12;
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