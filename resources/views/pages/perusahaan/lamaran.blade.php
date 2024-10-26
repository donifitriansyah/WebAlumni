@extends('layouts.perusahaan')
@section('title')
    Dashboard
@endsection
@section('content-perusahaan')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Lowongan</h1>
        </div>

        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID Lamaran</th>
                                <th>ID Lowongan</th>
                                <th>ID Alumni</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>CV</th>
                                <th>Transkrip Nilai</th>
                                <th>Portofolio</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Aksi</th> <!-- Added Actions column -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lamarans as $lamaran) <!-- Changed $lowongan to $lamaran -->
                                <tr>
                                    <td>{{ $lamaran->id_lamaran }}</td>
                                    <td>{{ $lamaran->id_lowongan }}</td>
                                    <td>{{ $lamaran->id_alumni }}</td>
                                    <td>{{ $lamaran->nama }}</td>
                                    <td>{{ $lamaran->email }}</td>
                                    <td><a href="{{ asset('storage/' . $lamaran->cv) }}" target="_blank">View CV</a></td>
                                    <td><a href="{{ asset('storage/' . $lamaran->transkrip_nilai) }}" target="_blank">View Transkrip</a></td>
                                    <td><a href="{{ asset('storage/' . $lamaran->portofolio) }}" target="_blank">View Portofolio</a></td>
                                    <td>{{ $lamaran->status }}</td>
                                    <td>{{ $lamaran->created_at }}</td>
                                    <td>{{ $lamaran->updated_at }}</td>
                                    <td>
                                        <!-- View Details Icon -->
                                        {{-- <button class="btn btn-info" data-bs-toggle="modal"
                                            data-bs-target="#detailModal{{ $lamaran->id_lamaran }}" title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </button> --}}

                                        <!-- Edit Icon as Button -->
                                        {{-- <button class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#editLamaranModal{{ $lamaran->id_lamaran }}" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button> --}}
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
