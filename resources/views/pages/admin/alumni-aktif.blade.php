@extends('layouts.admin')
@section('title')
Dashboard
@endsection
@section('content-admin')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Alumni Aktif</h1>
        </div>

        <!-- Tabel Alumni Pasif -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Alumni Aktif</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID User</th>
                                <th>Nama Alumni</th>
                                <th>NIM</th>
                                <th>Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>No. Telepon</th>
                                <th>Email</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($alumniAktif as $alumni)
                            <tr>
                                <td>{{ $alumni->id_user }}</td>
                                <td>{{ $alumni->nama_alumni }}</td>
                                <td>{{ $alumni->nim }}</td>
                                <td>{{ $alumni->tanggal_lahir }}</td>
                                <td>{{ $alumni->alamat }}</td>
                                <td>{{ $alumni->no_tlp }}</td>
                                <td>{{ $alumni->email }}</td>
                                <td>{{ $alumni->status }}</td>
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
