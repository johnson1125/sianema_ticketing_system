<?php
namespace App\Services;

use App\Models\Hall;
use App\Models\Seat;
use App\Factory\HallFactory\HallConcreteProductCreator\StandardHallFactory;
use App\Factory\HallFactory\HallConcreteProductCreator\PremiumHallFactory;
use App\Factory\HallFactory\HallConcreteProductCreator\FamilyHallFactory;
use App\Factory\HallFactory\HallConcreteProduct\StandardHall;
use App\Factory\HallFactory\HallConcreteProduct\PremiumHall;
use App\Factory\HallFactory\HallConcreteProduct\FamilyHall;
use App\Services\SeatService;

class HallService{
    /**
     * Create a new hall record.
     *
     * @param array $data
     * @return boolean
     */
    public function createHall(array $data){
        $hallId = $data['hallId'];
        $hallName = $data['hallName'];

        $hall = new Hall();
        $hall->hall_id = $hallId;
        $hall->hall_name = $hallName;
        $hall->hall_type = $data['hallType'];
        $hall->status = "open";

        if ($hall->save()) {
            $hallFactory = null;
            switch ($hall->hall_type) {
                case 'Standard':
                    $hallFactory = new StandardHallFactory();
                    break;
                case 'Premium':
                    $hallFactory = new PremiumHallFactory();
                    break;
                case 'Family':
                    $hallFactory = new FamilyHallFactory();
                    break;
                default:
                    break;
            }

            $seatCreator = new SeatService();
            $tempHall = $hallFactory->createHall($hallId, $hallName, $seatCreator);
            $tempHall->createSeats();
            return true;
        }else{
            return false;
        }
    }

     /**
     * update an existing hall status.
     *
     * @param string id
     * @return boolean
     */

    public function updateHallStatus(string $id){
        $hall = Hall::find($id);
        $hall->status = $hall->status === 'open' ? 'closed' : 'open';
    
        if ($hall->save()) {
            return true;
        } 

        return false;
    }
}