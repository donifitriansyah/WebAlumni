@extends('layouts.app')

@section('title')
    Alumni Karir
@endsection

@section('content')
    <!-- BERITA -->
    <!-- cssassep/bannerBerita2.css | javascript/banner.js -->
    @include('includes.frontend.berita')

    <!-- INI BAGIAN LOWONGAN PEKERJAAN -->
    <section id="bagian-job">
        @include('includes.frontend.loker')
        <a href="{{ route('loker') }}" class="btn">Selengkapnya →</a>
    </section>
    @include('includes.frontend.berita-rilis')

    @include('includes.frontend.contact')

    <!-- INI BAGIAN BERITA -->
@endsection
