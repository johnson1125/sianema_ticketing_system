<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Strategy\Context\PermissionCheckerContext;
use App\Strategy\ConcreteStrategy\TimeSlotManagerPermissionStrategy;
use App\Strategy\ConcreteStrategy\HallManagerPermissionStrategy;
use App\Strategy\ConcreteStrategy\MovieManagerPermissionStrategy;


class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        $user = Auth::user();
        $context = new PermissionCheckerContext();
        $strategy = $this->getStrategyBasedOnRole($role);
        $context->setStrategy($strategy);
        $hasPermission = $context->check($user);

        if (!$hasPermission) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }

    private function getStrategyBasedOnRole($role) {
        switch ($role) {
            case 'TimeSlotManager':
                return new TimeSlotManagerPermissionStrategy();
                break;
            case 'HallManager':
                return new HallManagerPermissionStrategy();
                break;
            case 'MovieManager':
                return new MovieManagerPermissionStrategy();
                break;
            default:
                abort(403, 'Unauthorized action.');
        }
    }    
}


