<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => [
                'required',
                'confirmed',
                Password::min(8) // Minimum length
                    ->letters() // At least one letter
                    ->mixedCase() // At least one uppercase and one lowercase letter
                    ->numbers() // At least one number
                    ->symbols() // At least one symbol
                    ->uncompromised(), // Optional: Ensure the password has not been compromised
            ],
            [
                'password.min' => 'The password must be at least 8 characters long.',
                'password.mixedCase' => 'The password must contain at least one uppercase and one lowercase letter.',
                'password.numbers' => 'The password must contain at least one number.',
                'password.symbols' => 'The password must contain at least one symbol.',
            ],
            'mobile_number' => [
                'required',
                'string',
                'regex:/^(01[0-9]{1}[0-9]{8}|01[0-9]{1}[0-9]{7})$/', // Regex for Malaysian mobile numbers
            ],
            'date_of_birth' => ['required', 'date'],           // Validate date of birth
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'mobile_number' => $request->mobile_number,
            'date_of_birth' => $request->date_of_birth,
            'profile_photo' => null,
        ]);

        // Assign the user role by default
        $user->assignRole('User');

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('home', absolute: false));
    }
}
