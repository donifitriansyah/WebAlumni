@extends('layouts.app')

@section('title')
    Lowongan Kerja
@endsection

@section('content')

    <!-- INI BAGIAN LOWONGAN PEKERJAAN -->
    <section id="bagian-job">
        @include('includes.frontend.loker')
    </section>

@endsection
