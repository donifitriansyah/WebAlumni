@extends('layouts.alumni')

@section('title')
History Alumni
@endsection

@section('content-alumni')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">History Alumni</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
        </a>
    </div>

    <!-- Application History Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Application History</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Lamaran</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>CV</th>
                            <th>Transkrip Nilai</th>
                            <th>Portofolio</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($applications) && !empty($applications))
                            @foreach($applications as $application)
                                <tr>
                                    <td>{{ $application['id_lamaran'] }}</td>
                                    <td>{{ $application['nama'] }}</td>
                                    <td>{{ $application['email'] }}</td>
                                    <td><a href="{{ asset('path/to/cv/'.$application['cv']) }}">Download</a></td>
                                    <td><a href="{{ asset('path/to/transkrip/'.$application['transkrip_nilai']) }}">Download</a></td>
                                    <td><a href="{{ asset('path/to/portopolio/'.$application['portopolio']) }}">View</a></td>
                                    <td>{{ $application['status'] }}</td>
                                    <td>{{ \Carbon\Carbon::parse($application['created_at'])->format('d-m-Y') }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8" class="text-center">No application history found.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
