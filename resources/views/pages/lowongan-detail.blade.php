@extends('layouts.app')

@section('title')
    Detail Lowongan Kerja
@endsection

<style>
    #detail-job {
        display: flex;
        justify-content: center;
        padding: 50px;
        margin-top: 100px;
    }

    .job-detail {
        display: flex;
        background-color: #fff;
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        max-width: 1200px;
        width: 100%;
    }

    .job-poster {
        flex: 1;
        background-color: #e6e6fa;
        padding: 30px;
        position: relative;
    }

    .job-poster img {
        width: 100%;
        height: auto;
        border-radius: 15px;
    }

    .job-info {
        flex: 1;
        padding: 30px;
    }

    .job-info h2 {
        color: #4b0082;
        border-bottom: 2px solid #4b0082;
        padding-bottom: 10px;
    }

    .company-profile {
        margin-top: 30px;
    }

    .company-profile p {
        line-height: 1.6;
    }

    button {
        background-color: #007bff;
        /* Primary color */
        color: white;
        /* Text color */
        border: none;
        /* No border */
        border-radius: 5px;
        /* Rounded corners */
        padding: 10px 20px;
        /* Padding for button */
        font-size: 16px;
        /* Font size */
        cursor: pointer;
        /* Pointer cursor on hover */
        transition: background-color 0.3s ease;
        /* Smooth transition */
        margin-top: 20px;
        /* Space above the button */
    }

    button:hover {
        background-color: #0056b3;
        /* Darker shade on hover */
    }

    @media (max-width: 768px) {
        .job-detail {
            flex-direction: column;
        }
    }
</style>

@section('content')
    <section id="detail-job">
        <div class="job-detail">
            <div class="job-poster">
                <img src="{{ asset('storage/' . $lowongan->gambar) }}" alt="{{ $lowongan->judul_lowongan }}">
            </div>
            <div class="job-info">
                <h2>{{ $lowongan->judul_lowongan }}</h2>
                <p><strong>Lokasi:</strong> {{ $lowongan->lokasi }}</p>
                <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($lowongan->tanggal_aktif)->format('d M Y') }}</p>
                <p><strong>Alamat:</strong> {{ $lowongan->perusahaan->alamat }}</p>
                <p><strong>Jenis Perusahaan:</strong> {{ $lowongan->perusahaan->sektor_bisnis }}</p>

                <div class="company-profile">
                    <h2>Profile Perusahaan</h2>
                    <h3>{{ $lowongan->perusahaan->nama_perusahaan }}</h3>
                    <p>{{ $lowongan->perusahaan->deskripsi_perusahaan }}</p>
                </div>

                @auth
                    @if (auth()->user()->role === 'alumni')
                        @php
                            // Check if the alumni has already applied for this job
                            $hasApplied = \App\Models\Lamaran::where('id_lowongan', $lowongan->id_lowongan)
                                ->where('id_alumni', auth()->user()->alumni->id_alumni)
                                ->exists();
                        @endphp

                        @if (!$hasApplied)
                            <a href="{{ route('lamaran.create', ['id_lowongan' => $lowongan->id_lowongan]) }}">Apply Lamaran</a>
                        @else
                            <p style="color: red">Anda sudah mengajukan lamaran untuk pekerjaan ini.</p>
                        @endif
                    @endif
                @endauth

            </div>
        </div>
    </section>
@endsection
