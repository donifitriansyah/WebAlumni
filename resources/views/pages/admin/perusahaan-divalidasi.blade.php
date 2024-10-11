@extends('layouts.admin')
@section('title')
Dashboard
@endsection
@section('content-admin')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Perusahaan</h1>
            <a href="{{ route('dashboard') }}" class="btn btn-primary">Kembali ke Dashboard</a>
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
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($nonActivePerusahaan    as $perusahaan)
                            <tr>
                                <td>{{$perusahaan->$id_perusahaan}}</td>
                                <td>{{ $perusahaan->nama_perusahaan }}</td>
                                <td>{{ $perusahaan->nib }}</td>
                                <td>{{ $perusahaan->sektor_bisnis }}</td>
                                <td>{{ $perusahaan->jumlah_karyawan }}</td>
                                <td><a href="{{ $perusahaan->website_perusahaan }}" target="_blank">{{ $perusahaan->website_perusahaan }}</a></td>
                                <td class="d-flex justify-content-center" style="gap: 4px;">
                                    <form action="{{route('terima-perusahaan' , $perusahaan->id_perusahaan)}}" method="post">
                                        @csrf
                                        <button type="submit" class= 'btn btn-success'>
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </form>
                                    <form action="{{route('tolak-perusahaan' , $perusahaan->id_perusahaan)}}" method="post">
                                        @csrf
                                        <button type="submit" class= 'btn btn-danger'>
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data perusahaan</td>
                            </tr>
                            @endforelse
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
