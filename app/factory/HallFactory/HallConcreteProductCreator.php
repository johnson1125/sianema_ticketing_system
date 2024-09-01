<?php
require_once 'HallProductCreator.php';

class StandardHallFactory implements HallFactory{
	public function createHall(): Hall{
		return new StandardHall();
	}
}

class PremiumHallFactory implements HallFactory{
	public function createHall(): Hall{
		return new PremiumHall();
	}
}

class FamilyHallFactory implements HallFactory{
	public function createHall(): Hall{
		return new FamilyHall();
	}
}