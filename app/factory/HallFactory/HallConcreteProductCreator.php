<?php
require_once 'HallProductCreator.php';

class StandardHallFactory implements HallFactory{
	public function createHall(): Hall{
		return new StandardHall();
	}
}

class PremiereHallFactory implements HallFactory{
	public function createHall(): Hall{
		return new PremiereHall();
	}
}

class FamilyHallFactory implements HallFactory{
	public function createHall(): Hall{
		return new FamilyHall();
	}
}