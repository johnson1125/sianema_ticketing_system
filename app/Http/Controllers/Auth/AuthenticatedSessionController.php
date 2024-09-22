<?php
//  Author: Lim Yu Her
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user();

        // Check the user's role and redirect accordingly
        if ($user->hasRole('Admin')) {
            return redirect()->route($this->getRouteToCorrectAdminPage(
                $this->getFirstMatchJobRole($user)
            ));
        } elseif ($user->hasRole('User')) {
            return redirect()->intended('/');
        }

        return redirect()->intended(route('home', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    private function getFirstMatchJobRole(User $user) {
        $currentUserRoles = $user->getRoleNames()->toArray();
        $userTypeRoles = ['Root', 'Admin', 'User'];

        // get all job roles i.e. either few of these are all: ['TimeSlotManager', 'HallManager', MovieManager']
        $filteredRoles = array_values(array_filter($currentUserRoles, function($item) use ($userTypeRoles) {
            return !in_array($item, $userTypeRoles);
        }));

        return $filteredRoles ? $filteredRoles[0] : null; // Get the first match or null if none found
    }

    private function getRouteToCorrectAdminPage($firstJobRole) {
        switch ($firstJobRole) {
            case 'TimeSlotManager':
                return 'admin';
                break;
            case 'HallManager':
                return 'manage.hall.index';
                break;
            case 'MovieManager':
                return 'movies.index';
                break;
            default:
                abort(403, 'Unauthorized action.');
        }
    }
}
