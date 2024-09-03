<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HallTimeSlot;
class HallTimeSlotDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Halltimeslot::create( [
            'hall_time_slot_id'=>'HALL-01-240822-06-00',
            'created_at'=>'2024-09-01 07:33:21',
            'updated_at'=>'2024-09-01 07:33:21',
            'startDateTime'=>'2024-08-22 10:00:00',
            'duration'=>'03:30:00',
            'timeSlotType'=>'Maintenance',
            'hall_id'=>'HALL-01',
            'movie_id'=>NULL,
            'maintenance_id'=>'MTN-TM-EM-003'
            ] );
            
            
                        
            Halltimeslot::create( [
            'hall_time_slot_id'=>'HALL-01-240822-11-00',
            'created_at'=>'2024-09-01 07:32:54',
            'updated_at'=>'2024-09-01 07:32:54',
            'startDateTime'=>'2024-08-22 03:00:00',
            'duration'=>'07:00:00',
            'timeSlotType'=>'Maintenance',
            'hall_id'=>'HALL-01',
            'movie_id'=>NULL,
            'maintenance_id'=>'MTN-C-DP-003'
            ] );
            
            
                        
            Halltimeslot::create( [
            'hall_time_slot_id'=>'HALL-01-240901-03-00',
            'created_at'=>'2024-09-01 07:47:25',
            'updated_at'=>'2024-09-01 07:47:25',
            'startDateTime'=>'2024-09-01 07:00:00',
            'duration'=>'01:30:00',
            'timeSlotType'=>'Maintenance',
            'hall_id'=>'HALL-01',
            'movie_id'=>NULL,
            'maintenance_id'=>'MTN-TM-EM-003'
            ] );
            
            
                        
            Halltimeslot::create( [
            'hall_time_slot_id'=>'HALL-01-240901-07-00',
            'created_at'=>'2024-09-01 07:38:16',
            'updated_at'=>'2024-09-01 07:38:16',
            'startDateTime'=>'2024-09-01 11:00:00',
            'duration'=>'03:30:00',
            'timeSlotType'=>'Maintenance',
            'hall_id'=>'HALL-01',
            'movie_id'=>NULL,
            'maintenance_id'=>'MTN-TM-EM-003'
            ] );
            
            
                        
            Halltimeslot::create( [
            'hall_time_slot_id'=>'HALL-01-240901-10-00',
            'created_at'=>'2024-09-01 07:38:04',
            'updated_at'=>'2024-09-01 07:38:04',
            'startDateTime'=>'2024-09-01 02:00:00',
            'duration'=>'01:30:00',
            'timeSlotType'=>'Maintenance',
            'hall_id'=>'HALL-01',
            'movie_id'=>NULL,
            'maintenance_id'=>'MTN-TM-EM-003'
            ] );
            
            
                        
            Halltimeslot::create( [
            'hall_time_slot_id'=>'HALL-02-240901-10-00',
            'created_at'=>'2024-09-01 08:25:57',
            'updated_at'=>'2024-09-01 08:25:57',
            'startDateTime'=>'2024-09-01 02:00:00',
            'duration'=>'07:00:00',
            'timeSlotType'=>'Maintenance',
            'hall_id'=>'HALL-02',
            'movie_id'=>NULL,
            'maintenance_id'=>'MTN-C-DP-003'
            ] );
            
            
    }
}
