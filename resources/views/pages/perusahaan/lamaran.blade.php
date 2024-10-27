@extends('layouts.perusahaan')
@section('title')
    Dashboard
@endsection
@section('content-perusahaan')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Lamaran</h1>
        </div>

        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                {{-- <th>ID Lamaran</th>
                                <th>ID Lowongan</th>
                                <th>ID Alumni</th> --}}
                                <th>Nama</th>
                                <th>Email</th>
                                <th>CV</th>
                                <th>Transkrip Nilai</th>
                                <th>Portofolio</th>
                                <th>Status</th>
                                <th>Waktu Melamar</th>
                                <th>Detail</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lamarans as $lamaran)
                                <!-- Changed $lowongan to $lamaran -->
                                <tr>
                                    {{-- <td>{{ $lamaran->id_lamaran }}</td>
                                    <td>{{ $lamaran->id_lowongan }}</td>
                                    <td>{{ $lamaran->id_alumni }}</td> --}}
                                    <td>{{ $lamaran->nama }}</td>
                                    <td>{{ $lamaran->email }}</td>
                                    <td><a href="{{ asset('storage/' . $lamaran->cv) }}" target="_blank">View CV</a></td>
                                    <td><a href="{{ asset('storage/' . $lamaran->transkrip_nilai) }}" target="_blank">View
                                            Transkrip</a></td>
                                    <td><a href="{{ asset('storage/' . $lamaran->portofolio) }}" target="_blank">View
                                            Portofolio</a></td>
                                    <td>{{ $lamaran->status }}</td>
                                    <td>{{ $lamaran->created_at }}</td>
                                    <td>
                                        <!-- View Details Icon -->
                                        <button class="btn btn-info" data-bs-toggle="modal"
                                            data-bs-target="#detailModal{{ $lamaran->id_lamaran }}" title="View Details">
                                            <i class="fas fa-user"></i>
                                        </button>
                                        <!-- Job Posting (Lowongan) Details Button -->
                                        <button class="btn btn-secondary" data-bs-toggle="modal"
                                            data-bs-target="#lowonganModal{{ $lamaran->id_lamaran }}"
                                            title="View Lowongan Details">
                                            <i class="fas fa-briefcase"></i>
                                        </button>
                                    </td>
                                    <td>
                                        @if ($lamaran->status !== 'tolak' && $lamaran->status !== 'terima')
                                            <!-- Accept Button -->
                                            <form
                                                action="{{ route('lamaran.updateStatus', ['id' => $lamaran->id_lamaran, 'status' => 'accepted']) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-success" title="Terima">
                                                    <i class="fas fa-check"></i> Terima
                                                </button>
                                            </form>

                                            <!-- Reject Button -->
                                            <form
                                                action="{{ route('lamaran.updateStatus', ['id' => $lamaran->id_lamaran, 'status' => 'rejected']) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-danger" title="Tolak">
                                                    <i class="fas fa-times"></i> Tolak
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-muted">
                                                {{ $lamaran->status === 'terima' ? 'Diterima' : 'Ditolak' }}
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                {{-- Detail alumni --}}
                                <div class="modal fade" id="detailModal{{ $lamaran->id_lamaran }}" tabindex="-1"
                                    aria-labelledby="detailModalLabel{{ $lamaran->id_lamaran }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="detailModalLabel{{ $lamaran->id_lamaran }}">
                                                    Alumni Details
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Display Alumni Information -->
                                                <p><strong>Nama:</strong> {{ $lamaran->alumni->nama_alumni ?? 'N/A' }}</p>
                                                <p><strong>Email:</strong> {{ $lamaran->alumni->email ?? 'N/A' }}</p>
                                                <p><strong>Alamat:</strong> {{ $lamaran->alumni->alamat ?? 'N/A' }}</p>
                                                <p><strong>No Telepon:</strong> {{ $lamaran->alumni->no_tlp ?? 'N/A' }}</p>
                                                <!-- Add other alumni fields as needed -->
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Detail Lowongan --}}
                                <!-- Lowongan Details Modal -->
                                <div class="modal fade" id="lowonganModal{{ $lamaran->id_lamaran }}" tabindex="-1"
                                    aria-labelledby="lowonganModalLabel{{ $lamaran->id_lamaran }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="lowonganModalLabel{{ $lamaran->id_lamaran }}">
                                                    Lowongan Details
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>Judul Lowongan:</strong>
                                                    {{ $lamaran->lowongan->judul_lowongan ?? 'N/A' }}</p>
                                                <p><strong>Posisi Pekerjaan:</strong>
                                                    {{ $lamaran->lowongan->posisi_pekerjaan ?? 'N/A' }}</p>
                                                <p><strong>Deskripsi Pekerjaan:</strong>
                                                    {{ $lamaran->lowongan->deskripsi_pekerjaan ?? 'N/A' }}</p>
                                                <p><strong>Tipe Pekerjaan:</strong>
                                                    {{ $lamaran->lowongan->tipe_pekerjaan ?? 'N/A' }}</p>
                                                <p><strong>Jumlah Kandidat:</strong>
                                                    {{ $lamaran->lowongan->jumlah_kandidat ?? 'N/A' }}</p>
                                                <p><strong>Lokasi:</strong> {{ $lamaran->lowongan->lokasi ?? 'N/A' }}</p>
                                                <p><strong>Rentang Gaji:</strong>
                                                    {{ $lamaran->lowongan->rentang_gaji ?? 'N/A' }}</p>
                                                <p><strong>Pengalaman Kerja:</strong>
                                                    {{ $lamaran->lowongan->pengalaman_kerja ?? 'N/A' }}</p>
                                                <p><strong>Kontak:</strong> {{ $lamaran->lowongan->kontak ?? 'N/A' }}</p>
                                                <!-- Add more lowongan details if needed -->
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
@endsection
