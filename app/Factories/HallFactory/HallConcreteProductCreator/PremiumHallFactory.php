<?php
namespace App\Factories\HallFactory\HallConcreteProductCreator;
use App\Factories\HallFactory\HallProductCreatorInterface;
use App\Factories\HallFactory\HallInterface;
use App\Services\SeatService;
use App\Factories\HallFactory\HallConcreteProduct\PremiumHallConcreteProduct;

class PremiumHallFactory implements HallProductCreatorInterface{
    public function createHall(string $hallID, string $hallName, SeatService $seatCreator): HallInterface {
        return new PremiumHallConcreteProduct($hallID, $hallName, $seatCreator);
    }
}