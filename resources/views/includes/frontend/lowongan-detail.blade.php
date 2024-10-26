{{-- resources/views/pages/lowongan/detail.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    {{-- Header Section --}}
                    <div class="text-center mb-4">
                        @if($loker->gambar)
                            <img src="{{ Storage::url($loker->gambar) }}"
                                 alt="{{ $loker->perusahaan->nama_perusahaan }}"
                                 class="img-fluid mb-3 rounded"
                                 style="max-height: 200px; object-fit: contain;">
                        @endif
                        <h1 class="h3 mb-2">{{ $loker->judul_lowongan }}</h1>
                        <h2 class="h5 text-muted">{{ $loker->perusahaan->nama_perusahaan }}</h2>
                    </div>

                    {{-- Job Details Section --}}
                    <div class="job-details mb-4">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <h3 class="h6 text-muted">Lokasi</h3>
                                <p>{{ $loker->lokasi }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <h3 class="h6 text-muted">Kategori</h3>
                                <p>{{ $loker->kategori->nama_kategori ?? 'Tidak ada kategori' }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <h3 class="h6 text-muted">Gaji</h3>
                                <p>{{ $loker->gaji ?? 'Negosiasi' }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <h3 class="h6 text-muted">Batas Lamaran</h3>
                                <p>{{ $loker->batas_lamaran ? \Carbon\Carbon::parse($loker->batas_lamaran)->format('d F Y') : 'Tidak ada batas' }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Job Description --}}
                    <div class="mb-4">
                        <h3 class="h5 mb-3">Deskripsi Pekerjaan</h3>
                        <div class="description">
                            {!! nl2br(e($loker->deskripsi)) !!}
                        </div>
                    </div>

                    {{-- Application Form --}}
                    @auth
                        <div class="application-form mt-5">
                            <h3 class="h5 mb-4">Form Lamaran</h3>
                            <form action="{{ route('lamaran.store', $loker->id) }}"
                                  method="POST"
                                  enctype="multipart/form-data"
                                  class="needs-validation"
                                  novalidate>
                                @csrf

                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                    <input type="text"
                                           class="form-control @error('nama') is-invalid @enderror"
                                           id="nama"
                                           name="nama"
                                           value="{{ old('nama', auth()->user()->name) }}"
                                           required>
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           id="email"
                                           name="email"
                                           value="{{ old('email', auth()->user()->email) }}"
                                           required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="cv" class="form-label">CV (PDF/DOC/DOCX)</label>
                                    <input type="file"
                                           class="form-control @error('cv') is-invalid @enderror"
                                           id="cv"
                                           name="cv"
                                           accept=".pdf,.doc,.docx"
                                           required>
                                    @error('cv')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="transkrip_nilai" class="form-label">Transkrip Nilai (Opsional)</label>
                                    <input type="file"
                                           class="form-control @error('transkrip_nilai') is-invalid @enderror"
                                           id="transkrip_nilai"
                                           name="transkrip_nilai"
                                           accept=".pdf,.doc,.docx">
                                    @error('transkrip_nilai')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="portfolio" class="form-label">Portfolio (Opsional)</label>
                                    <input type="file"
                                           class="form-control @error('portfolio') is-invalid @enderror"
                                           id="portfolio"
                                           name="portfolio"
                                           accept=".pdf,.doc,.docx">
                                    @error('portfolio')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary w-100">Kirim Lamaran</button>
                            </form>
                        </div>
                    @else
                        <div class="alert alert-info">
                            Silakan <a href="{{ route('login') }}" class="alert-link">login</a> untuk mengirim lamaran.
                        </div>
                    @endauth

                    {{-- Success Message --}}
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Form validation
    (function () {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
@endpush
@endsection
