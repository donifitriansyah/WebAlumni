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
                <h6 class="m-0 font-weight-bold text-primary">Daftar Lowongan Pekerjaan yang Diterima</h6>
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($showLowonganDiterima as $lowongan)
                            <tr>
                                <td>{{ $lowongan->id_lowongan }}</td>
                                <td>{{ $lowongan->judul_lowongan }}</td>
                                <td>{{ $lowongan->posisi_pekerjaan }}</td>
                                <td>{{ $lowongan->lokasi }}</td>
                                <td>{{ $lowongan->kontak }}</td>
                                <td>{{ $lowongan->status }}</td>
                                <td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
