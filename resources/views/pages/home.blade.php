@extends('layouts.app')

@section('title')
    Alumni Karir
@endsection

<!-- Tambahkan Modal -->
<div class="modal fade" id="welcomeModal" tabindex="-1" aria-labelledby="welcomeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="welcomeModalLabel">Tracer Study 2024</h5>
            </div>
            <div class="modal-body">
                <p>Tracer Study 2024 adalah kegiatan Survey Penelusuran Alumni yang digunakan untuk melihat keterserapan Alumni di Industri, Wirausaha dan Studi Lanjut. Data ini sangat diperlukan untuk kegiatan Akreditasi Prodi.</p>

                <p>Kami sangat menghargai kesediaan Alumni dalam meluangkan waktunya untuk kegiatan ini.</p>

                <p>Semoga kegiatan Tracer Study ini dapat menjadi amal jariyah bagi kita semua.</p>

                <p>Atas Perhatian dan Kerjasamanya, kami mengucapkan terima kasih yang sebesar-besarnya.</p>

                <!-- Tambahkan link Google Form jika diperlukan -->
                <a href="#" class="text-primary" data-bs-dismiss="modal">Kalau Merasa Sudah KLIK Disini Yaa</a>
            </div>
            <div class="modal-footer">
                <a href="/register-alumni" class="btn btn-primary">Yuk isi Tracer Study</a>
            </div>
        </div>
    </div>
</div>

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

    <!-- Script buat pop up -->
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var welcomeModal = new bootstrap.Modal(document.getElementById('welcomeModal'));
            welcomeModal.show();
        });
    </script>
    @endpush
@endsection
