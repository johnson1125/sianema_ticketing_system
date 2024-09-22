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
use Spatie\Permission\Models\Role;


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

        // $roles = $user->getRoleNames();
        // $permissions = $user->getAllPermissions();
        // dd($permissions); // This will display all permissions for the user
        // $hasHallPermission = $user->hasPermissionTo('manage halls');
        // dd($hasHallPermission);
        switch ($role) {
            case 'TimeSlotManager':
                $strategy = new TimeSlotManagerPermissionStrategy();
                break;
            case 'HallManager':
                $strategy = new HallManagerPermissionStrategy();
                break;
            case 'MovieManager':
                $strategy = new MovieManagerPermissionStrategy();
                break;
            default:
                abort(403, 'Unauthorized action.');
        }

        $context->setStrategy($strategy);

        $hasPermission = $context->check($user);

        if (!$hasPermission) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
