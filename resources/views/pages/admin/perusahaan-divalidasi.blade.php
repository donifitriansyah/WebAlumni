@extends('layouts.app')

@section('content')
    <h2>Perusahaan Divalidasi</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Perusahaan</th>
                <th>Sektor Bisnis</th>
                <th>Jumlah Karyawan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($perusahaanDivalidasi as $perusahaan)
                <tr>
                    <td>{{ $perusahaan->nama_perusahaan }}</td>
                    <td>{{ $perusahaan->sektor_bisnis }}</td>
                    <td>{{ $perusahaan->jumlah_karyawan }}</td>
                    <td>
                        <form action="{{ route('admin.perusahaan.terima', $perusahaan->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-success">✓</button>
                        </form>
                        <form action="{{ route('admin.perusahaan.tolak', $perusahaan->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger">✗</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
