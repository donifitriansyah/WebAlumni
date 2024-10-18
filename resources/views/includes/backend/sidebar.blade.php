<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Brand Section -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-text mx-3">
            @if (Auth::check())
                @switch(Auth::user()->role)
                    @case('admin')
                        Admin
                    @break

                    @case('perusahaan')
                        Perusahaan
                    @break

                    @case('alumni')
                        Alumni
                    @break

                    @default
                        Polnep
                @endswitch
            @endif
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Role-Based Navbar -->
    @if (Auth::check())
    @switch(Auth::user()->role)
        @case('admin')
            <!-- Navbar for Admin -->
            <li class="nav-item {{ Route::is('dashboard.admin') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard.admin') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item {{ Route::is('alumni-aktif', 'alumni-pasif') ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAlumni"
                   aria-expanded="true" aria-controls="collapseAlumni">
                    <i class="fas fa-fw fa-user-graduate"></i>
                    <span>Alumni</span>
                </a>
                <div id="collapseAlumni" class="collapse" aria-labelledby="headingUtilities"
                     data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ Route::is('alumni-aktif') ? 'active' : '' }}" href="{{ route('alumni-aktif') }}">Alumni Aktif</a>
                        <a class="collapse-item {{ Route::is('alumni-pasif') ? 'active' : '' }}" href="{{ route('alumni-pasif') }}">Alumni Pasif</a>
                    </div>
                </div>
            </li>

            <li class="nav-item {{ Route::is('perusahaan-diterima', 'perusahaan-divalidasi', 'lowongan-diterima', 'lowongan-divalidasi') ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePerusahaan"
                   aria-expanded="true" aria-controls="collapsePerusahaan">
                    <i class="fas fa-fw fa-building"></i>
                    <span>Perusahaan</span>
                </a>
                <div id="collapsePerusahaan" class="collapse" aria-labelledby="headingUtilities"
                     data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ Route::is('perusahaan-diterima') ? 'active' : '' }}" href="{{ route('perusahaan-diterima') }}">Perusahaan Diterima</a>
                        <a class="collapse-item {{ Route::is('perusahaan-divalidasi') ? 'active' : '' }}" href="{{ route('perusahaan-divalidasi') }}">Perusahaan Divalidasi</a>
                        <a class="collapse-item {{ Route::is('lowongan-diterima') ? 'active' : '?' }}" href="{{route('lowongan-diterima')}}">Lowongan Diterima</a>
                        <a class="collapse-item {{ Route::is('lowongan-divalidasi') ? 'active' : '?' }}" href="{{route ('lowongan-divalidasi')}}">Lowongan Divalidasi</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTracer"
                   aria-expanded="true" aria-controls="collapseTracer">
                    <i class="fa fa-graduation-cap"></i>
                    <span>Tracer Study</span>
                </a>
                <div id="collapseTracer" class="collapse" aria-labelledby="headingUtilities"
                     data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('pertanyaan.index') }}">Pertanyaan</a>
                        <a class="collapse-item" href="utilities-border.html">Data Tracer Study</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser"
                   aria-expanded="true" aria-controls="collapseUser">
                    <i class="fa fa-user"></i>
                    <span>Admin</span>
                </a>
                <div id="collapseUser" class="collapse" aria-labelledby="headingUtilities"
                     data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('admin.create', Auth::user()->admin->id_admin) }}">
                            Edit Profile
                        </a>
                    </div>
                </div>
            </li>

            <li class="nav-item {{ Route::is('berita.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('berita.index') }}">
                    <i class="fas fa-fw fa-newspaper"></i>
                    <span>Berita</span>
                </a>
            </li>

        @break

        @case('alumni')
            <!-- Navbar for Alumni -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-user-graduate"></i>
                    <span>Alumni</span>
                </a>
            </li>
        @break

        @case('perusahaan')
            <!-- Navbar for Perusahaan -->
            <li class="nav-item {{ Route::is('dashboard.perusahaan') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard.perusahaan') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item {{ Route::is('lowongan.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('lowongan.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Lowongan</span>
                </a>
            </li>

        @break
    @endswitch
@endif

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>


{{-- <!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Utilities</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities-color.html">Colors</a>
            <a class="collapse-item" href="utilities-border.html">Borders</a>
            <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a>
        </div>
    </div>
</li> --}}
