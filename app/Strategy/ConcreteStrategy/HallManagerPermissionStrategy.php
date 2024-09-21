<?php
namespace App\Strategy\ConcreteStrategy;

use App\Strategy\PermissionStrategy;
use App\Models\User;

class HallManagerPermissionStrategy implements PermissionStrategy
{
    public function hasPermission(User $user): bool
    {
        return $user->hasPermissionTo('manage halls');
    }
}