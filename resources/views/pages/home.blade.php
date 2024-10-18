@extends('layouts.app')

@section('title')
    Alumni Karir
@endsection

@section('content')
    <!-- BERITA -->
    <!-- cssassep/bannerBerita2.css | javascript/banner.js -->
    @include('includes.frontend.berita')

    <!-- INI BAGIAN LOWONGAN PEKERJAAN -->
    @include('includes.frontend.loker')

    <!-- INI BAGIAN BERITA -->
    @include('includes.frontend.berita-rilis')
@endsection
