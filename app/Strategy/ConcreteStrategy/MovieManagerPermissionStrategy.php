<?php
//  Author: Lim Yu Her
namespace App\Strategy\ConcreteStrategy;

use App\Strategy\PermissionStrategy;
use App\Models\User;

class MovieManagerPermissionStrategy implements PermissionStrategy
{
    public function hasPermission(User $user): bool
    {
        return $user->hasPermissionTo('manage movies');
    }
}