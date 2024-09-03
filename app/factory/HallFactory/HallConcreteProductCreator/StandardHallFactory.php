<?php
namespace App\Factory\HallFactory\HallConcreteProductCreator;

use App\Factory\HallFactory\HallProductCreatorInterface;
use App\Factory\HallFactory\HallInterface;
use App\Factory\HallFactory\SeatCreator;
use App\Factory\HallFactory\HallConcreteProduct\StandardHallConcreteProduct;


class StandardHallFactory implements HallProductCreatorInterface {
    public function createHall(string $hallID, string $hallName, SeatCreator $seatCreator): HallInterface {
        return new StandardHallConcreteProduct($hallID, $hallName, $seatCreator);
    }
}