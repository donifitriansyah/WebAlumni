@extends('layouts.app')

@section('content')
    <h2>Perusahaan Diterima</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Perusahaan</th>
                <th>Sektor Bisnis</th>
                <th>Jumlah Karyawan</th>
                <th>Website</th>
            </tr>
        </thead>
        <tbody>
            @foreach($perusahaanDiterima as $perusahaan)
                <tr>
                    <td>{{ $perusahaan->nama_perusahaan }}</td>
                    <td>{{ $perusahaan->sektor_bisnis }}</td>
                    <td>{{ $perusahaan->jumlah_karyawan }}</td>
                    <td><a href="{{ $perusahaan->website_perusahaan }}" target="_blank">{{ $perusahaan->website_perusahaan }}</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
