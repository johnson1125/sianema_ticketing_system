<?php
namespace App\Factory\HallFactory;

//Product
interface HallInterface{
    public function createSeats(): void;
    public function getHallID(): string;
    public function getHallName(): string;
    public function getRows(): int;
    public function getColumns(): int;
}