<?php
namespace App\Factories\HallFactory;

use App\Factories\HallFactory\HallInterface;
use App\Services\SeatService;

//Factory Interface
interface HallProductCreatorInterface {
    public function createHall(string $hallID, string $hallName, SeatService $seatCreator): HallInterface;
}