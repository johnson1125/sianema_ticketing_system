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
        Permission::findOrCreate('manage timeslots');
        Permission::findOrCreate('manage halls');
        Permission::findOrCreate('manage movies');

        // Assign permissions to roles
        $timeslotManager->givePermissionTo('manage timeslots');
        $hallManager->givePermissionTo('manage halls');
        $movieManager->givePermissionTo('manage movies');

        // Attach roles to the user named "root"
        $rootUser = User::where('is_root', true)->first();

        if ($rootUser) {
            $rootUser->assignRole($timeslotManager->id);
            $rootUser->assignRole($hallManager);
            $rootUser->assignRole($movieManager);
        }
    }
}
