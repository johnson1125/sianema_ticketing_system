<?php
namespace App\Factory\HallFactory;
use App\Factory\HallFactory\HallInterface;
use App\Services\SeatService;

// Author: Sia Yeong Sheng

//Factory Interface
interface HallProductCreatorInterface {
    public function createHall(string $hallID, string $hallName, SeatService $seatCreator): HallInterface;
}