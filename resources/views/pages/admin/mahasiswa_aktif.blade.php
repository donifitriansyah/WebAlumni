@extends('layouts.admin')
@section('title')
Dashboard
@endsection
@section('content-admin')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tabel Alumni Aktif</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Alumni Aktif</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Alumni</th>
                            <th>NIM</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Email</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama Alumni</th>
                            <th>NIM</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Email</th>
                            <th>Status</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($alumnis as $alumni)
                        <tr>
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
