<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Alumni;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function showDashboard(Request $request)
    {
        $admin = $request->session()->get('admin');


        $aktifAlumni = Alumni::where('status', 'aktif')->count();
        $pasifAlumni = Alumni::where('status', 'pasif')->count();

        $activeCompanies = Perusahaan::where('status', 'diterima')->count();
        $nonActiveCompanies = Perusahaan::where('status', 'ditolak')->count();


        return view('pages.admin.dashboard', compact('admin','aktifAlumni', 'pasifAlumni', 'activeCompanies', 'nonActiveCompanies'));
    }
}
