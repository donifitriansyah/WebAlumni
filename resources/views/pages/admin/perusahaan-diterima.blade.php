@extends('layouts.admin')
@section('title')
Perusahaan
@endsection
@section('content-admin')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Perusahaan Aktif</h1>
        </div>

        <!-- Tabel Perusahaan Aktif -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Perusahaan Aktif</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Perusahaan</th>
                                <th>NIB</th>
                                <th>Alamat</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Tanggal Aktivasi</th>
                                <!-- kolom lainnya -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($activePerusahaan as $perusahaan)
                            <tr>
                                <td>{{ $perusahaan->nama_perusahaan }}</td>
                                <td>{{ $perusahaan->nib }}</td>
                                <td>{{ $perusahaan->alamat }}</td>
                                <td>{{ $perusahaan->email_perusahaan }}</td>
                                <td>{{ $perusahaan->status }}</td>
                                <td>{{ $perusahaan->tanggal_aktif ? $perusahaan->tanggal_aktif->format('d M Y H:i') : '-' }}</td>
                                <!-- kolom lainnya -->
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
