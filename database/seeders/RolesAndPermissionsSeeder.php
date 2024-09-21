<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define roles
        $timeslotManager = Role::findOrCreate('TimeSlotManager');
        $hallManager = Role::findOrCreate('HallManager');
        $movieManager = Role::findOrCreate('MovieManager');

        // Define permissions
        $manageTimeSlotsPermission = Permission::findOrCreate('manage timeslots');
        $manageHallsPermission = Permission::findOrCreate('manage halls');
        $manageMoviesPermission = Permission::findOrCreate('manage movies');

        // Assign permissions to roles
        $timeslotManager->givePermissionTo($manageTimeSlotsPermission);
        $hallManager->givePermissionTo($manageHallsPermission);
        $movieManager->givePermissionTo($manageMoviesPermission);

        // Attach roles to the user named "root"
        $rootUser = User::where('is_root', true)->first();

        if ($rootUser) {
            $rootUser->assignRole('TimeSlotManager');
            $rootUser->assignRole('HallManager');
            $rootUser->assignRole('MovieManager');
        }
    }
}
