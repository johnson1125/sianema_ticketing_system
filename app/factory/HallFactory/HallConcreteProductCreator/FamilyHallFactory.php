<?php
namespace App\Factory\HallFactory\HallConcreteProductCreator;
use App\Factory\HallFactory\HallProductCreatorInterface;
use App\Factory\HallFactory\HallInterface;
use App\Factory\HallFactory\SeatCreator;
use App\Factory\HallFactory\HallConcreteProduct\FamilyHallConcreteProduct;

class FamilyHallFactory implements HallProductCreatorInterface{
    public function createHall(string $hallID, string $hallName, SeatCreator $seatCreator): HallInterface {
        return new FamilyHallConcreteProduct($hallID, $hallName, $seatCreator);
    }
}