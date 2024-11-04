@extends('layouts.perusahaan')
@section('title')
Dashboard
@endsection
@section('content-perusahaan')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard Perusahaan</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Status Perusahaan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $perusahaan->status }} <!-- Display the company's status -->
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-fw fa-building fa-2x text-gray-300"></i> <!-- Corrected the icon class -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if (Auth::user()->perusahaan->status !== 'menunggu')
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Jumlah Lowongan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-fw fa-user-graduate fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Jumlah Pelamar</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-fw fa-user-graduate fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif








        </div>

    </div>
    @if(session('info'))
    <script>
        Swal.fire({
            icon: 'info',
            title: 'Notice',
            text: '{{ session("info") }}'
        });
    </script>
@endif

@endsection
