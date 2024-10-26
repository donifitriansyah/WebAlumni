@extends('layouts.lamaran')

@section('content-alumni')

<div class="container">
    <h2 style="margin-top: 20px">Ajukan Lamaran Pekerjaan</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('lamaran.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <input type="text" class="form-control" name="id_lowongan" id="id_lowongan" value="{{ $id_lowongan }}" hidden>
            <input type="text" class="form-control" name="id_alumni" id="id_alumni" value="{{ auth()->user()->alumni->id_alumni }}" hidden>
            <input type="text" class="form-control" name="nama" id="nama" value="{{ auth()->user()->alumni->nama_alumni }}" hidden>
            <input type="email" class="form-control" name="email" id="email" value="{{ auth()->user()->email }}" hidden>

        <div class="form-group">
            <label for="cv">CV (PDF/DOC/DOCX)</label>
            <input type="file" class="form-control" name="cv" id="cv" accept=".pdf,.doc,.docx" required>
        </div>

        <div class="form-group">
            <label for="transkrip_nilai">Transkrip Nilai (Optional)</label>
            <input type="file" class="form-control" name="transkrip_nilai" id="transkrip_nilai" accept=".pdf,.doc,.docx">
        </div>

        <div class="form-group">
            <label for="portofolio">Portofolio (Optional)</label>
            <input type="file" class="form-control" name="portofolio" id="portofolio" accept=".pdf,jpg,jpeg,png">
        </div>

        <button type="submit" class="btn btn-primary">Ajukan Lamaran</button>
    </form>
</div>
@endsection
