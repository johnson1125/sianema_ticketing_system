<?php
//  Author: Lim Yu Her
namespace App\Strategy;

use App\Models\User;

interface PermissionStrategy
{
    public function hasPermission(User $user): bool;
}
