<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index()
    {
        // Display list of admins
        $admins = User::role('admin')->get(); // Get all users with admin role
        return view('admin.manageAdmin.index', compact('admins'));
    }

    public function create()
    {
        // Display form to create a new admin
        $roles = Role::all(); // List of roles to assign
        return view('admin.manageAdmin.create', compact('roles'));
    }

    public function store(Request $request)
    {
        // Validate input
        $validated = $request->validate([
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
            'roles' => ['required', 'array'],
            'roles.*' => Rule::in(['TimeSlotManager', 'HallManager', 'MovieManager']),
            'roles.*.in' => 'The selected role is invalid.'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'mobile_number' => $request->mobile_number,
            'date_of_birth' => $request->date_of_birth,
            'profile_photo' => null,
        ]);

        // Assign selected roles
        $user->assignRole('Admin');
        $user->assignRole($validated['roles']); // Spatie's assignRole method

        return redirect()->route('adminManagement')->with('success', 'Admin created successfully.');
    }

    public function edit($id)
    {
        $admin = User::findOrFail($id);
        $roles = Role::all(); // Get all roles
        return view('admin.manageAdmin.edit', compact('admin', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $admin = User::findOrFail($id);

        // Validate input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'roles' => 'required|array',
        ]);

        // Update user details
        $admin->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);

        // Sync roles
        $admin->syncRoles($validated['roles']); // Spatie's syncRoles method

        return redirect()->route('adminManagement')->with('success', 'Admin updated successfully.');
    }

    public function destroy($id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();

        return redirect()->route('adminManagement')->with('success', 'Admin deleted successfully.');
    }
}
