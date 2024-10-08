<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Alumni;
use App\Models\User;
use App\Models\Perusahaan;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('pages.auth.register_user');
    }

    public function FormRegisterAdmin(): View
    {
        return view('pages.auth.register_admin');
    }
    public function FormRegisterAlumni(): View
    {
        return view('pages.auth.register_alumni');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:' . User::class],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],

        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
    public function RegisterAdmin(Request $request): RedirectResponse
    {
        // Validasi data
        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed',
            'nama' => 'required|string|max:255',
            'nomor_induk' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
        ]);

        // Buat pengguna baru
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin', // Atau sesuai kebutuhan
        ]);

        // Buat data admin terkait dengan user yang baru dibuat
        Admin::create([
            'id_user' => $user->id, // Simpan id_user
            'nama' => $request->nama,
            'nomor_induk' => $request->nomor_induk,
            'no_hp' => $request->no_hp,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }

    public function RegisterAlumni(Request $request): RedirectResponse
    {
        // Validasi input dasar
        $request->validate([
            'nama_alumni' => 'required|string|max:255',
            'nim' => 'required|string|unique:alumni', // unique:alumni karena nim disimpan di tabel alumni
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'no_tlp' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:alumni',
            'password' => 'required|string|confirmed',
        ]);

        // Ekstraksi bagian awal dari NIM sebagai integer
        $nimPrefix = (int) substr($request->nim, 0, 5);

        // Validasi jika NIM di atas 32022 tidak bisa mendaftar
        if ($nimPrefix >= 32022) {
            return back()->withErrors(['nim' => 'NIM tidak valid, hanya mahasiswa dengan NIM 32021 dan di bawahnya yang bisa mendaftar.']);
        }

        // Buat user
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'alumni',
        ]);

        // Buat data alumni
        Alumni::create([
            'id_user' => $user->id,
            'nama_alumni' => $request->nama_alumni,
            'nim' => $request->nim,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'no_tlp' => $request->no_tlp,
            'email' => $request->email,
            'status' => 'pasif', // Atau sesuai kebutuhan
        ]);

        // Data perusahaan


        // Login user
        Auth::login($user);

        return redirect(route('dashboard'));
    }

    public function RegisterPerusahaan(Request $request): RedirectResponse
    {
        // Validasi input
        $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'nib' => 'required|string|unique:perusahaan',
            'email_perusahaan' => 'required|string|email|max:255|unique:perusahaan',
            'sektor_bisnis' => 'required|string|max:255',
            'deskripsi_perusahaan' => 'required|string',
            'jumlah_karyawan' => 'required|integer',
            'no_telp' => 'required|string|max:20',
            'website_perusahaan' => 'nullable|url|max:255',
            'password' => 'required|string|confirmed',
            'status' => 'required|string|in:menunggu,diterima,ditolak',
        ]);

        // Buat user
        $user = User::create([
            'name' => $request->nama_perusahaan,
            'email' => $request->email_perusahaan,
            'password' => Hash::make($request->password),
            'role' => 'perusahaan',
        ]);

        // Buat data perusahaan
        Perusahaan::create([
            'id_user' => $user->id,
            'nama_perusahaan' => $request->nama_perusahaan,
            'nib' => $request->nib,
            'email_perusahaan' => $request->email_perusahaan,
            'sektor_bisnis' => $request->sektor_bisnis,
            'deskripsi_perusahaan' => $request->deskripsi_perusahaan,
            'jumlah_karyawan' => $request->jumlah_karyawan,
            'no_telp' => $request->no_telp,
            'website_perusahaan' => $request->website_perusahaan,
            'status' => 'menunggu validasi', // Status awal
        ]);

        // // Redirect dengan pesan sukses
        // return redirect()->route('login')
        //                  ->with('success', 'Registrasi perusahaan berhasil. Silahkan menunggu validasi dari admin.');
        // Login user
        Auth::login($user);

        return redirect(route('dashboard'));
    }
}
