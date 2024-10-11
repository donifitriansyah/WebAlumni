@extends('layouts.admin')
@section('title')
Dashboard
@endsection
@section('content-admin')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Perusahaan Nonaktif</h1>
    </div>

    <!-- Tabel Perusahaan Aktif -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Perusahaan Nonaktif</h6>
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($nonActivePerusahaan as $perusahaan)
                        <tr>
                            <td>{{ $perusahaan->nama_perusahaan }}</td>
                            <td>{{ $perusahaan->nib }}</td>
                            <td>{{ $perusahaan->alamat }}</td>
                            <td>{{ $perusahaan->email_perusahaan }}</td>
                            <td>{{ $perusahaan->sektor_bisnis }}</td>
                            <td>{{ $perusahaan->deskripsi_perusahaan }}</td>
                            <td>{{ $perusahaan->jumlah_karyawan }}</td>
                            <td>{{ $perusahaan->no_telp }}</td>
                            <td>{{ $perusahaan->website_perusahaan }}</td>
                            <td>{{ $perusahaan->status }}</td>
                            <td class="d-flex justify-content-center" style="gap: 4px;">
                                <form action="{{ route('terima-perusahaan', $perusahaan->id_perusahaan) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </form>
                                <form action="{{ route('tolak-perusahaan', $perusahaan->id_perusahaan) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-times"></i>
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
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
@endsection

