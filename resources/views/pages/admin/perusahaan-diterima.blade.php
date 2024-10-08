@extends('layouts.admin')
@section('title')
Dashboard
@endsection
@section('content-admin')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Perusahaan</h1>
        </div>

        <!-- Tabel Perusahaan -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Perusahaan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Perusahaan</th>
                                <th>NIB</th>
                                <th>Sektor Bisnis</th>
                                <th>Jumlah Karyawan</th>
                                <th>Website</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($perusahaan as $p)
                            <tr>
                                <td>{{ $p->nama_perusahaan }}</td>
                                <td>{{ $p->nib }}</td>
                                <td>{{ $p->sektor_bisnis }}</td>
                                <td>{{ $p->jumlah_karyawan }}</td>
                                <td><a href="{{ $p->website_perusahaan }}" target="_blank">{{ $p->website_perusahaan }}</a></td>
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
