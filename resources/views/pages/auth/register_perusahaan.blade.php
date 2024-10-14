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
                            <form class="user" method="POST" action="{{ route('register-perusahaan') }}">
                                @csrf
                                <!-- Personal Information -->
                                <h5 class="mb-3">Informasi Pengguna</h5>
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
                                    <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" placeholder="Email" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                        name="password" placeholder="Password" required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user"
                                        name="password_confirmation" placeholder="Konfirmasi Password" required>
                                </div>

                                <!-- Company Information -->
                                <h5 class="mt-4 mb-3">Informasi Perusahaan</h5>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user @error('nama_perusahaan') is-invalid @enderror"
                                        name="nama_perusahaan" value="{{ old('nama_perusahaan') }}" placeholder="Nama Perusahaan" required>
                                    @error('nama_perusahaan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user @error('nib') is-invalid @enderror"
                                        name="nib" value="{{ old('nib') }}" placeholder="NIB" required>
                                    @error('nib')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user @error('alamat') is-invalid @enderror"
                                        name="alamat" value="{{ old('alamat') }}" placeholder="Alamat" required>
                                    @error('alamat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user @error('email_perusahaan') is-invalid @enderror"
                                        name="email_perusahaan" value="{{ old('email_perusahaan') }}" placeholder="Email Perusahaan" required>
                                    @error('email_perusahaan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user @error('sektor_bisnis') is-invalid @enderror"
                                        name="sektor_bisnis" value="{{ old('sektor_bisnis') }}" placeholder="Sektor Bisnis" required>
                                    @error('sektor_bisnis')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control @error('deskripsi_perusahaan') is-invalid @enderror"
                                        name="deskripsi_perusahaan" placeholder="Deskripsi Perusahaan" rows="3" required>{{ old('deskripsi_perusahaan') }}</textarea>
                                    @error('deskripsi_perusahaan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control form-control-user @error('jumlah_karyawan') is-invalid @enderror"
                                        name="jumlah_karyawan" value="{{ old('jumlah_karyawan') }}" placeholder="Jumlah Karyawan" required>
                                    @error('jumlah_karyawan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user @error('no_telp') is-invalid @enderror"
                                        name="no_telp" value="{{ old('no_telp') }}" placeholder="Nomor Telepon Perusahaan" required>
                                    @error('no_tlp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="url" class="form-control form-control-user @error('website_perusahaan') is-invalid @enderror"
                                        name="website_perusahaan" value="{{ old('website_perusahaan') }}" placeholder="Website Perusahaan">
                                    @error('website_perusahaan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Perusahaan
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
