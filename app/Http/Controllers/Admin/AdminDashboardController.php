<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\Perusahaan;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function showDashboard()
    {

        $aktifAlumni = Alumni::where('status', 'active')->count();
        $pasifAlumni = Alumni::where('status', 'pasif')->count();

        $activeCompanies = Perusahaan::where('status', 'active')->count();
        $nonActiveCompanies = Perusahaan::where('status', 'nonactive')->count();


        return view('pages.admin.dashboard', compact('aktifAlumni', 'pasifAlumni', 'activeCompanies', 'nonActiveCompanies'));
    }
}
