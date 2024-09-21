<?php
namespace App\Strategy\ConcreteStrategy;

use App\Strategy\PermissionStrategy;
use App\Models\User;

class TimeSlotManagerPermissionStrategy implements PermissionStrategy
{
    public function hasPermission(User $user): bool
    {
        return $user->hasPermissionTo('manage timeslots');
    }
}