<?php
namespace App\Factories\HallFactory\HallConcreteProductCreator;
use App\Factory\HallFactory\HallProductCreatorInterface;
use App\Factory\HallFactory\HallInterface;
use App\Services\SeatService;
use App\Factory\HallFactory\HallConcreteProduct\PremiumHallConcreteProduct;

class PremiumHallFactory implements HallProductCreatorInterface{
    public function createHall(string $hallID, string $hallName, SeatService $seatCreator): HallInterface {
        return new PremiumHallConcreteProduct($hallID, $hallName, $seatCreator);
    }
}