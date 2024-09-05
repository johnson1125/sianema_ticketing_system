<?php
namespace App\Factory\HallFactory\HallConcreteProductCreator;
use App\Factory\HallFactory\HallProductCreatorInterface;
use App\Factory\HallFactory\HallInterface;
use App\Services\SeatService;
use App\Factory\HallFactory\HallConcreteProduct\FamilyHallConcreteProduct;

class FamilyHallFactory implements HallProductCreatorInterface{
    public function createHall(string $hallID, string $hallName, SeatService $seatCreator): HallInterface {
        return new FamilyHallConcreteProduct($hallID, $hallName, $seatCreator);
    }
}