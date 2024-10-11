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
        $request->validate([
            'id_user' => 'required|exists:users,id',
            'email' => 'required|email|unique:users,email,' . $request->input('id_user'), // Validasi email
            'nama' => 'required|string|max:255',
            'nomor_induk' => 'required|string|max:100|unique:admin,nomor_induk,' . $id_admin . ',id_admin',
            'no_hp' => 'required|string|max:15',
            'password' => 'nullable|string|min:6|confirmed', // Validasi password
        ]);

        // Temukan admin berdasarkan ID
        $admin = Admin::findOrFail($id_admin);

        // Update data admin
        $admin->id_user = $request->input('id_user');
        $admin->nama = $request->input('nama');
        $admin->nomor_induk = $request->input('nomor_induk');
        $admin->no_hp = $request->input('no_hp');

        // Temukan user terkait admin
        $user = User::findOrFail($admin->id_user);
        $user->email = $request->input('email'); // Update email

        // Jika password diberikan, update password
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password')); // Enkripsi password
        }

        // Simpan perubahan
        $user->save();
        $admin->save();

        // Kembali dengan respons sukses
        return response()->json([
            'message' => 'Admin updated successfully',
            'admin' => $admin
        ]);
    }
}
