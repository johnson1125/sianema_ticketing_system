<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    public function index()
    {
        // Display list of admins
        $admins = User::role('admin')->get(); // Get all users with admin role
        return view('adminManagement.index', compact('admins'));
    }

    public function create()
    {
        // Display form to create a new admin
        $roles = Role::all(); // List of roles to assign
        return view('adminManagement.create', compact('roles'));
    }

    public function store(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'roles' => 'required|array',
        ]);

        // Create user
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        // Assign selected roles
        $user->assignRole($validated['roles']); // Spatie's assignRole method

        return redirect()->route('admin-management.index')->with('success', 'Admin created successfully.');
    }

    public function edit($id)
    {
        $admin = User::findOrFail($id);
        $roles = Role::all(); // Get all roles
        return view('admin-management.edit', compact('admin', 'roles'));
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

        return redirect()->route('admin-management.index')->with('success', 'Admin updated successfully.');
    }

    public function destroy($id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();

        return redirect()->route('admin-management.index')->with('success', 'Admin deleted successfully.');
    }
}
