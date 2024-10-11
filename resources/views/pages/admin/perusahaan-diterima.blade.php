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
                                <th>Sektor Bisnis</th>
                                <th>Deskripsi</th>
                                <th>Jumlah Karyawan</th>
                                <th>No. Telepon</th>
                                <th>Website</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($perusahaanDiterima as $perusahaan)
                            <tr>
                                <td>{{$perusahaan->id_perusahaan}}</td>
                                <td>{{ $perusahaan->nama_perusahaan }}</td>
                                <td>{{ $perusahaan->nib }}</td>
                                <td>{{ $perusahaan->sektor_bisnis }}</td>
                                <td>{{ $perusahaan->jumlah_karyawan }}</td>
                                <td><a href="{{ $perusahaan->website_perusahaan }}" target="_blank">{{ $perusahaan->website_perusahaan }}</a></td>
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
