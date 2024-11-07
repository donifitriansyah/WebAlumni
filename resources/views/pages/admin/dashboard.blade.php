@extends('layouts.admin')
@section('title')
    Dashboard
@endsection
@section('content-admin')
    <div class="container-fluid">

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Jumlah Alumni Aktif</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $aktifAlumni }}</div>
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
                                    Jumlah Alumni Pasif</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pasifAlumni }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-fw fa-user-graduate fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Perusahaan
                                    yang Sudah Aktif</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $activeCompanies }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-building fa-2x text-gray-300"></i>
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
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Jumlah Perusahaan
                                    yang Belum Divalidasi</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $nonActiveCompanies }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-building fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                showConfirmButton: true,
                timer: 3000 // Optional: automatically close the alert after 3 seconds
            });
        </script>
    @endif

    @if ($errors->has('login_error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops!',
                text: "{{ implode(', ', $errors->get('login_error')) }}",
                showConfirmButton: true,
                timer: 3000 // Optional: automatically close the alert after 3 seconds
            });
        </script>
    @endif
@endsection
