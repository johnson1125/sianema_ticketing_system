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
        Role::findOrCreate('User');
        Role::findOrCreate('Admin');
        Role::findOrCreate('Root');
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
            $rootUser->assignRole('Admin');
            $rootUser->assignRole('Root');
            $rootUser->assignRole('TimeSlotManager');
            $rootUser->assignRole('HallManager');
            $rootUser->assignRole('MovieManager');
        }

        
        // Retrieve all normal users
        $normalUser = User::where('is_root', false)->get();
        // Assign the 'User' role to each normal user
        foreach($normalUser as $user) {
            $user->assignRole('User');
        }
    }
}
