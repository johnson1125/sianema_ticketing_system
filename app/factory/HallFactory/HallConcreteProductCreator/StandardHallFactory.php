<?php
namespace App\Factory\HallFactory\HallConcreteProductCreator;

use App\Factory\HallFactory\HallProductCreatorInterface;
use App\Factory\HallFactory\HallInterface;
use App\Services\SeatService;
use App\Factory\HallFactory\HallConcreteProduct\StandardHallConcreteProduct;


class StandardHallFactory implements HallProductCreatorInterface {
    public function createHall(string $hallID, string $hallName, SeatService $seatCreator): HallInterface {
        return new StandardHallConcreteProduct($hallID, $hallName, $seatCreator);
    }
}