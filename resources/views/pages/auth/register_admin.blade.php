@extends('layouts.login')
@section('title')
Register Admin
@endsection
@section('content')
<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Mendaftar Sebagai Admin</h1>
                            </div>

                            <!-- Registration Form -->
                            <form class="user" method="POST" action="{{ route('register') }}">
                                @csrf

                                <!-- Username Field -->
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user @error('username') is-invalid @enderror"
                                        name="username" value="{{ old('username') }}" placeholder="Username">
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Name Field -->
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user @error('nama') is-invalid @enderror"
                                        name="nama" value="{{ old('nama') }}" placeholder="Nama Lengkap">
                                    @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Nomor Induk Field -->
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user @error('nomor_induk') is-invalid @enderror"
                                        name="nomor_induk" value="{{ old('nomor_induk') }}" placeholder="Nomor Induk">
                                    @error('nomor_induk')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Phone Number Field -->
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user @error('no_hp') is-invalid @enderror"
                                        name="no_hp" value="{{ old('no_hp') }}" placeholder="Nomor Handphone">
                                    @error('no_hp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Email Field -->
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" placeholder="Email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Password Field -->
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                        name="password" placeholder="Password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Confirm Password Field -->
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user"
                                        name="password_confirmation" placeholder="Confirm Password">
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Admin
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
