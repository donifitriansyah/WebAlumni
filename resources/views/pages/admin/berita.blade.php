@extends('layouts.admin')
@section('title')
    Dashboard
@endsection
@section('content-admin')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Berita</h1>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Berita</h6>
                <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                    data-bs-target="#tambahBeritaModal">
                    Tambah Berita
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul Berita</th>
                                <th>Tanggal Terbit</th>
                                <th>Link Berita</th>
                                <th>Aksi</th> <!-- Added Actions column -->
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($berita as $beritaItem)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $beritaItem->judul_berita }}</td>
                                    <td>{{ $beritaItem->tanggal_terbit }}</td>
                                    <td>{{ $beritaItem->link }}</td>
                                    <td>
                                        <!-- View Details Icon -->
                                        <button class="btn btn-info" data-bs-toggle="modal"
                                            data-bs-target="#detailModal{{ $beritaItem->id_berita }}" title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </button>

                                        <!-- Edit Icon as Button -->
                                        <button class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#editBeritaModal{{ $beritaItem->id_berita }}" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>

                                        <!-- Delete Icon -->
                                        <form action="{{ route('berita.destroy', $beritaItem->id_berita) }}"
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
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Data berita tidak tersedia.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

         @include('includes.backend.modal.admin.modal_berita')


    </div>


    <!-- Modal Tambah -->
    <div class="modal fade" id="tambahBeritaModal" tabindex="-1" aria-labelledby="tambahBeritaModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahBeritaModalLabel">Tambah Data Berita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="judul_berita" class="form-label">Judul Berita</label>
                            <input type="text" class="form-control" id="judul_berita" name="judul_berita"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_terbit" class="form-label">Tanggal Berita</label>
                            <input type="date" class="form-control" id="tanggal_terbit" name="tanggal_terbit"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi_berita" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi_berita" name="deskripsi_berita"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="link" class="form-label">Link</label>
                            <input type="text" class="form-control" id="link" name="link"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Tambah Berita</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
