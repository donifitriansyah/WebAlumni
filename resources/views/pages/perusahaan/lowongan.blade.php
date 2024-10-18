@extends('layouts.perusahaan')
@section('title')
    Dashboard
@endsection
@section('content-perusahaan')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Lowongan</h1>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Lowongan</h6>
                <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                    data-bs-target="#tambahLowonganModal">
                    Tambah Lowongan
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID Lowongan</th>
                                <th>Judul Lowongan</th>
                                <th>Posisi Pekerjaan</th>
                                <th>Deskripsi Pekerjaan</th>
                                <th>Tipe Pekerjaan</th>
                                <th>Jumlah Kandidat</th>
                                <th>Lokasi</th>
                                <th>Rentang Gaji</th>
                                <th>Pengalaman Kerja</th>
                                <th>Kontak</th>
                                <th>Status</th>
                                <th>Gambar</th>
                                <th>Aksi</th> <!-- Added Actions column -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lowongans as $lowongan)
                                <tr>
                                    <td>{{ $lowongan->id_lowongan }}</td>
                                    <td>{{ $lowongan->judul_lowongan }}</td>
                                    <td>{{ $lowongan->posisi_pekerjaan }}</td>
                                    <td>{{ $lowongan->deskripsi_pekerjaan }}</td>
                                    <td>{{ $lowongan->tipe_pekerjaan }}</td>
                                    <td>{{ $lowongan->jumlah_kandidat }}</td>
                                    <td>{{ $lowongan->lokasi }}</td>
                                    <td>{{ $lowongan->rentang_gaji }}</td>
                                    <td>{{ $lowongan->pengalaman_kerja }}</td>
                                    <td>{{ $lowongan->kontak }}</td>
                                    <td>{{ $lowongan->status }}</td>
                                    <td>
                                        <img src="{{ Storage::url($lowongan->gambar) }}" alt="Lowongan"
                                            style="width: 150px" class="img-thumbnail">
                                    </td>
                                    <td>
                                        <!-- View Details Icon -->
                                        <button class="btn btn-info" data-bs-toggle="modal"
                                            data-bs-target="#detailModal{{ $lowongan->id_lowongan }}" title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </button>


                                        <!-- Edit Icon as Button -->
                                        <button class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#editLowonganModal{{ $lowongan->id_lowongan }}" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>

                                        <!-- Delete Icon -->
                                        <form action="{{ route('lowongan.destroy', $lowongan->id_lowongan) }}"
                                            method="POST" style="display:inline;"
                                            onsubmit="return confirm('Anda yakin ingin menghapus?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


         @include('includes.backend.modal.perusahaan.modal_lowongan')


    </div>


    <!-- Modal Tambah -->
    <div class="modal fade" id="tambahLowonganModal" tabindex="-1" aria-labelledby="tambahLowonganModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahLowonganModalLabel">Tambah Data Lowongan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('lowongan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="judul_lowongan" class="form-label">Judul Lowongan</label>
                            <input type="text" class="form-control @error('judul_lowongan') is-invalid @enderror" id="judul_lowongan" name="judul_lowongan"
                                value="{{ old('judul_lowongan') }}" required>
                            @error('judul_lowongan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="posisi_pekerjaan" class="form-label">Posisi Pekerjaan</label>
                            <input type="text" class="form-control @error('posisi_pekerjaan') is-invalid @enderror" id="posisi_pekerjaan" name="posisi_pekerjaan"
                                value="{{ old('posisi_pekerjaan') }}" required>
                            @error('posisi_pekerjaan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar">
                            @error('gambar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi_pekerjaan" class="form-label">Deskripsi Pekerjaan</label>
                            <textarea class="form-control @error('deskripsi_pekerjaan') is-invalid @enderror" id="deskripsi_pekerjaan" name="deskripsi_pekerjaan" rows="3" required>{{ old('deskripsi_pekerjaan') }}</textarea>
                            @error('deskripsi_pekerjaan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tipe_pekerjaan" class="form-label">Tipe Pekerjaan</label>
                            <select class="form-select @error('tipe_pekerjaan') is-invalid @enderror" id="tipe_pekerjaan" name="tipe_pekerjaan" required>
                                <option value="Full-time" {{ old('tipe_pekerjaan') == 'Full-time' ? 'selected' : '' }}>Penuh Waktu</option>
                                <option value="Part-time" {{ old('tipe_pekerjaan') == 'Part-time' ? 'selected' : '' }}>Paruh Waktu</option>
                                <option value="Contract" {{ old('tipe_pekerjaan') == 'Contract' ? 'selected' : '' }}>Kontrak</option>
                            </select>
                            @error('tipe_pekerjaan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="jumlah_kandidat" class="form-label">Jumlah Kandidat</label>
                            <input type="number" class="form-control @error('jumlah_kandidat') is-invalid @enderror" id="jumlah_kandidat" name="jumlah_kandidat"
                                value="{{ old('jumlah_kandidat') }}" required>
                            @error('jumlah_kandidat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="lokasi" class="form-label">Lokasi</label>
                            <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi"
                                value="{{ old('lokasi') }}" required>
                            @error('lokasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="rentang_gaji" class="form-label">Rentang Gaji</label>
                            <input type="text" class="form-control @error('rentang_gaji') is-invalid @enderror" id="rentang_gaji" name="rentang_gaji"
                                value="{{ old('rentang_gaji') }}" required>
                            @error('rentang_gaji')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="pengalaman_kerja" class="form-label">Pengalaman Kerja</label>
                            <input type="text" class="form-control @error('pengalaman_kerja') is-invalid @enderror" id="pengalaman_kerja" name="pengalaman_kerja"
                                value="{{ old('pengalaman_kerja') }}" required>
                            @error('pengalaman_kerja')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="kontak" class="form-label">Kontak</label>
                            <input type="text" class="form-control @error('kontak') is-invalid @enderror" id="kontak" name="kontak"
                                value="{{ old('kontak') }}" required>
                            @error('kontak')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Tambah Lowongan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
