<?php
require_once 'HallInterface.php';

//Creator, can be abstract class / interface
interface HallFactory{
    public function createHall(): Hall;
}