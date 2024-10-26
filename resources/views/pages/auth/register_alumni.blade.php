@extends('layouts.login')

@section('title')
    Register Alumni
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
                                    <h1 class="h4 text-gray-900 mb-4">Mendaftar Sebagai Alumni</h1>
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


                                <form class="user" method="POST" action="{{ route('register-alumni') }}"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <input type="text"
                                            class="form-control form-control-user @error('username') is-invalid @enderror"
                                            name="username" value="{{ old('username') }}" placeholder="Username" required>
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input type="text"
                                            class="form-control form-control-user @error('nim') is-invalid @enderror"
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

                                    <div class="form-group">
                                        <input type="date"
                                            class="form-control form-control-user @error('tanggal_lahir') is-invalid @enderror"
                                            name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                                            placeholder="Tanggal Lahir" required>
                                        @error('tanggal_lahir')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input type="text"
                                            class="form-control form-control-user @error('alamat') is-invalid @enderror"
                                            name="alamat" value="{{ old('alamat') }}" placeholder="Alamat" required>
                                        @error('alamat')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input type="text"
                                            class="form-control form-control-user @error('no_tlp') is-invalid @enderror"
                                            name="no_tlp" value="{{ old('no_tlp') }}" placeholder="Nomor Telepon"
                                            required>
                                        @error('no_tlp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input type="email"
                                            class="form-control form-control-user @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" placeholder="Email" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input type="file"
                                            class="form-control form-control @error('gambar') is-invalid @enderror"
                                            name="gambar">
                                        @error('gambar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

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

                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Register Alumni
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

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "{{ session('success') }}",
                showConfirmButton: true,
                timer: 3000
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            let errorMessages =
                `@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach`;
            Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan!',
                html: errorMessages,
                showConfirmButton: true,
                timer: 5000
            });
        </script>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection
