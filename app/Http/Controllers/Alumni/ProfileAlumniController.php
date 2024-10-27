<?php

namespace App\Http\Controllers\Alumni;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\User;
use Illuminate\Support\Facades\Hash;




use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileAlumniController extends Controller
{
    public function index($id_alumni)
    {
        // Fetch the alumni data by ID
        $alumni = Alumni::findOrFail($id_alumni);

        // Pass the alumni data to the view
        return view('pages.alumni.profile', compact('alumni'));
    }

    public function update(Request $request, $id_alumni)
{
    $alumni = Alumni::findOrFail($id_alumni);
    $user = User::findOrFail($alumni->id_user);

    $request->validate([
        'nama_alumni' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'no_tlp' => 'required|string|max:15',
        'alamat' => 'required|string|max:255',
        'tanggal_lahir' => 'required|date|max:255',
        'password' => 'nullable|string|min:8|confirmed',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Validation for image
    ]);

    // Update alumni data
    $alumni->nama_alumni = $request->input('nama_alumni');
    $alumni->no_tlp = $request->input('no_tlp');
    $alumni->alamat = $request->input('alamat');
    $alumni->tanggal_lahir = $request->input('tanggal_lahir');

    // Update email only if it has changed
    if ($request->input('email') !== $user->email) {
        $user->email = $request->input('email');
    }

    // Update password if provided
    if ($request->filled('password')) {
        $user->password = Hash::make($request->input('password'));
    }

    // Handle image upload
    if ($request->hasFile('gambar')) {
        // Delete the old image if it exists
        if ($alumni->gambar) {
            Storage::disk('public')->delete($alumni->gambar);
        }

        $file = $request->file('gambar');
        // Save the new image
        $gambarPath = $file->store('alumni', 'public');
        $alumni->gambar = $gambarPath; // Update the alumni record with the new image path
    }

    // Save changes
    $user->save();
    $alumni->save();

    return redirect()->back()->with('success', 'Alumni updated successfully');
}

}
