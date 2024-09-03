<?php
namespace App\Factory\HallFactory;

use App\Factory\HallFactory\HallInterface;

//Factory Interface
interface HallProductCreatorInterface {
    public function createHall(string $hallID, string $hallName, SeatCreator $seatCreator): HallInterface;
}