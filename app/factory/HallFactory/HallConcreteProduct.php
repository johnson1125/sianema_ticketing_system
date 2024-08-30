<?php
require_once 'HallInterface.php';

//concrete products
class StandardHall implements Hall{
    public function createSeats($rowsNum, $columnsNum): void{

    }
}

class PremiereHall implements Hall{
    public function createSeats($rowsNum, $columnsNum): void{

    }
}

class FamilyHall implements Hall{
    public function createSeats($rowsNum, $columnsNum): void{

    }
}