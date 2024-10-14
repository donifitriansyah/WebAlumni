@extends('layouts.login')

@section('title')
    Register Perusahaan
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Mendaftar Sebagai Perusahaan</h1>
                                </div>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form class="user" method="POST" action="{{ route('register-alumni') }}">
                                    @csrf
                                    <!-- Personal Information -->
                                    <h5 class="mb-3">Informasi Pribadi</h5>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user @error('username') is-invalid @enderror"
                                            name="username" value="{{ old('username') }}" placeholder="Username" required>
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user @error('nim') is-invalid @enderror"
                                            name="nim" value="{{ old('nim') }}" placeholder="NIM" required>
                                        @error('nim')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text"
                                            class="form-control form-control-user @error('nama_alumni') is-invalid @enderror"
                                            name="nama_alumni" value="{{ old('nama_alumni') }}" placeholder="Nama Lengkap"
                                            required>
                                        @error('nama_alumni')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <!-- Other personal fields... -->

                                    <!-- Company Information -->
                                    <h5 class="mt-4 mb-3">Informasi Perusahaan</h5>
                                    <div class="form-group">
                                        <input type="text"
                                            class="form-control form-control-user @error('nama_perusahaan') is-invalid @enderror"
                                            name="nama_perusahaan" value="{{ old('nama_perusahaan') }}" placeholder="Nama Perusahaan">
                                        @error('nama_perusahaan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text"
                                            class="form-control form-control-user @error('sektor_bisnis') is-invalid @enderror"
                                            name="sektor_bisnis" value="{{ old('sektor_bisnis') }}" placeholder="Sektor Bisnis">
                                        @error('sektor_bisnis')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <textarea
                                            class="form-control @error('deskripsi_perusahaan') is-invalid @enderror"
                                            name="deskripsi_perusahaan" placeholder="Deskripsi Perusahaan"
                                            rows="3">{{ old('deskripsi_perusahaan') }}</textarea>
                                        @error('deskripsi_perusahaan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="number"
                                            class="form-control form-control-user @error('jumlah_karyawan') is-invalid @enderror"
                                            name="jumlah_karyawan" value="{{ old('jumlah_karyawan') }}" placeholder="Jumlah Karyawan">
                                        @error('jumlah_karyawan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text"
                                            class="form-control form-control-user @error('no_tlp_perusahaan') is-invalid @enderror"
                                            name="no_tlp_perusahaan" value="{{ old('no_tlp_perusahaan') }}" placeholder="Nomor Telepon Perusahaan">
                                        @error('no_tlp_perusahaan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="url"
                                            class="form-control form-control-user @error('website_perusahaan') is-invalid @enderror"
                                            name="website_perusahaan" value="{{ old('website_perusahaan') }}" placeholder="Website Perusahaan">
                                        @error('website_perusahaan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Password Fields -->
                                    <h5 class="mt-4 mb-3">Keamanan</h5>
                                    <div class="form-group">
                                        <input type="password"
                                            class="form-control form-control-user @error('password') is-invalid @enderror"
                                            name="password" placeholder="Password" required>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                            name="password_confirmation" placeholder="Confirm Password" required>
                                    </div>

                                    <!-- Submit Button -->
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Register Alumni and Company
                                    </button>
                                </form>

                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
