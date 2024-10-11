<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function create($id_admin)
    {
        // Fetch the admin data by ID
        $admin = Admin::findOrFail($id_admin);

        // Pass the admin data to the view
        return view('pages.admin.edit-profile', compact('admin'));
    }
    public function update(Request $request, $id_admin)
{
    $admin = Admin::findOrFail($id_admin);
    $user = User::findOrFail($admin->id_user);

    $request->validate([
        'nama' => 'required|string|max:255',
        'nomor_induk' => 'required|string|max:100|unique:admin,nomor_induk,' . $id_admin . ',id_admin',
        'no_hp' => 'required|string|max:15',
        'email' => 'required|email|unique:users,email,' . $user->id, // Email validation (skips uniqueness for the current email)
        'password' => 'nullable|string|min:6|confirmed', // Validasi password
    ]);

    // Update admin data
    $admin->nama = $request->input('nama');
    $admin->nomor_induk = $request->input('nomor_induk');
    $admin->no_hp = $request->input('no_hp');

    // Update email only if it has changed
    if ($request->input('email') !== $user->email) {
        $user->email = $request->input('email'); // Update email only if it's different
    }

    // Update password if provided
    if ($request->filled('password')) {
        $user->password = Hash::make($request->input('password')); // Encrypt the new password
    }

    // Save changes
    $user->save();
    $admin->save();

    // Redirect with a success message
    return redirect()->back()->with('success', 'Admin updated successfully');
}
}
