@extends('layouts.admin')

@section('content')
    <h1>Lowongan Divalidasi</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Perusahaan</th>
                <th>Judul Lowongan</th>
                <th>Posisi Pekerjaan</th>
                <th>Rentang Gaji</th>
                <th>Pengalaman Kerja</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lowonganDivalidasi as $lowongan)
                <tr>
                    <td>{{ $lowongan->perusahaan->nama }}</td>
                    <td>{{ $lowongan->judul_lowongan }}</td>
                    <td>{{ $lowongan->posisi_pekerjaan }}</td>
                    <td>{{ $lowongan->rentang_gaji }}</td>
                    <td>{{ $lowongan->pengalaman_kerja }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
