@extends('layouts.admin')

@section('content-perusahaan')
<div class="container">
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
                <td>{{ $perusahaan->nib }}</td>
                <td>{{ $perusahaan->sektor_bisnis }}</td>
                <td>{{ $perusahaan->jumlah_karyawan }}</td>
                <td>
                    <form action="{{ route('admin.perusahaan.terima', $perusahaan->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-success btn-sm">✓</button>
                    </form>
                    <form action="{{ route('admin.perusahaan.tolak', $perusahaan->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">✗</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
