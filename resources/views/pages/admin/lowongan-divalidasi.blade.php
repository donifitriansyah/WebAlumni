@extends('layouts.admin')
@section('title')
    Perusahaan
@endsection
@section('content-admin')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Lowongan Pekerjaan</h1>
        </div>

        <!-- Tabel Perusahaan Aktif -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Lowongan Pekerjaan Yang Masuk</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>id_lowongan</th>
                                <th>Judul Lowongan</th>
                                <th>Posisi Pekerjaan</th>
                                <th>Lokasi Penempatan</th>
                                <th>Kontak yang dapat dihubungi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($showLowonganDivalidasi as $lowongan)
                                <tr>
                                    <td>{{ $lowongan->id_lowongan }}</td>
                                    <td>{{ $lowongan->judul_lowongan }}</td>
                                    <td>{{ $lowongan->posisi_pekerjaan }}</td>
                                    <td>{{ $lowongan->lokasi }}</td>
                                    <td>{{ $lowongan->kontak }}</td>
                                    <td>{{ $lowongan->status }}</td>
                                    <td class="d-flex justify-content-center" style="gap: 4px;">
                                        <form action="{{ route('terima-lowongan', $lowongan->id_lowongan) }}"
                                            method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-success">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('tolak-lowongan', $lowongan->id_lowongan) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </form>
                                        <button class="btn btn-info" data-toggle="modal"
                                            data-target="#detailModal{{ $lowongan->id_lowongan }}">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Detail -->
    <div class="modal fade" id="detailModal{{ $lowongan->id_lowongan }}" tabindex="-1"
        aria-labelledby="detailModalLabel{{ $lowongan->id_lowongan }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Detail Lowongan</h5>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>ID Lowongan</th>
                            <td>{{ $lowongan->id_lowongan }}</td>
                        </tr>
                        <tr>
                            <th>Perusahaan</th>
                            <td>{{ $lowongan->id_perusahaan }}</td>
                        </tr>
                        <tr>
                            <th>Judul Lowongan</th>
                            <td>{{ $lowongan->judul_lowongan }}</td>
                        </tr>
                        <tr>
                            <th>Posisi Pekerjaan</th>
                            <td>{{ $lowongan->posisi_pekerjaan }}</td>
                        </tr>
                        <tr>
                            <th>Deskripsi Pekerjaan</th>
                            <td>{{ $lowongan->deskripsi_pekerjaan }}</td>
                        </tr>
                        <tr>
                            <th>Gambar</th>
                            <td><img src="{{ asset('storage/' . $lowongan->gambar) }}"
                                    alt="Gambar Lowongan" width="200"></td>
                        </tr>
                        <tr>
                            <th>Tipe Pekerjaan</th>
                            <td>{{ $lowongan->tipe_pekerjaan }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Kandidat</th>
                            <td>{{ $lowongan->jumlah_kandidat }}</td>
                        </tr>
                        <tr>
                            <th>Lokasi</th>
                            <td>{{ $lowongan->lokasi }}</td>
                        </tr>
                        <tr>
                            <th>Rentang Gaji</th>
                            <td>{{ $lowongan->rentang_gaji }}</td>
                        </tr>
                        <tr>
                            <th>Pengalaman Kerja</th>
                            <td>{{ $lowongan->pengalaman_kerja }}</td>
                        </tr>
                        <tr>
                            <th>Kontak</th>
                            <td>{{ $lowongan->kontak }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $lowongan->status }}</td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
@endsection
