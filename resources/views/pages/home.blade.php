@extends('layouts.app')

@section('title')
    Alumni Karir
@endsection

<!-- Tambahkan Modal -->
<div class="modal fade" id="welcomeModal" tabindex="-1" aria-labelledby="welcomeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg border-0 rounded">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="welcomeModalLabel">Tracer Study 2024</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-justify">
                <p class="lead" style="font-family: Poppins; font-size: 20px">Tracer Study 2024 adalah kegiatan Survey Penelusuran Alumni yang digunakan untuk melihat keterserapan Alumni di Industri, Wirausaha dan Studi Lanjut. Data ini sangat diperlukan untuk kegiatan Akreditasi Prodi.

                   <br> Kami sangat menghargai kesediaan Alumni dalam meluangkan waktunya untuk kegiatan ini <br>Semoga kegiatan Tracer Study ini dapat menjadi amal jariyah bagi kita semua. <br> Atas Perhatian dan Kerjasamanya, kami mengucapkan terima kasih yang sebesar-besarnya.
                </p>

                <a href="#" class="text-primary fw-bold" data-bs-dismiss="modal">Kalau Merasa Sudah KLIK Disini Yaa</a>
            </div>
            <div class="modal-footer">
                <a href="/register-alumni" class="btn btn-success">Yuk isi Tracer Study</a>
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
