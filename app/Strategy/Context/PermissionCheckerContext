<?php
namespace App\Strategy\Context;

use App\Strategy\PermissionStrategy;
use App\Models\User;

class PermissionCheckerContext
{
    private PermissionStrategy $strategy;

    public function setStrategy(PermissionStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function check(User $user): bool
    {
        return $this->strategy->hasPermission($user);
    }
}