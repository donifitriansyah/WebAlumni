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

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <meta charset="UTF-8"> -->
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <!-- <title>Landing Page - Tracer Study</title> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* CSS khusus untuk memperkecil ukuran tombol dalam modal */
        .modal .btn-custom {
            font-size: 0.875rem; /* Ukuran font lebih kecil */
            padding: 6px 2px;   /* Padding lebih kecil */
            border-radius: 4px;  /* Sudut tombol lebih bulat */
            background-color: #28a745; /* Warna latar hijau */
            color: #fff;         /* Warna teks putih */
            transition: background-color 0.3s; /* Efek transisi */
            text-decoration: none;
        }

        .modal .btn-custom:hover {
            background-color: #218838; /* Warna latar lebih gelap saat hover */
        }

        .modal .btn-close-custom {
            font-size: 0.875rem; /* Ukuran font lebih kecil */
            padding: 6px 12px;   /* Padding lebih kecil */
        }
    </style>
</head>
<body>

   <!-- Modal Structure -->
   <div class="modal fade" id="tracerStudyModal" tabindex="-1" aria-labelledby="tracerStudyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tracerStudyModalLabel">Tracer Study Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Tracer Study 2024 adalah kegiatan Survey Penelusuran Alumni yang digunakan untuk melihat keterserapan Alumni di Industri, Wirausaha dan Studi Lanjut. Data ini sangat diperlukan untuk kegiatan Akreditasi Prodi.
                    Kami sangat menghargai kesediaan Alumni dalam meluangkan waktunya untuk kegiatan ini.</p>
                    <p>Semoga kegiatan Tracer Study ini dapat menjadi amal jariyah bagi kita semua.</p><br>

                    <p>Atas Perhatian dan Kerjasamanya, kami mengucapkan terima kasih yang sebesar-besarnya.</p>

                    <!-- Button with Bootstrap 'btn-sm' class to make it smaller -->
                    <a href="{{ route('tracerstudy.form') }}" class="btn-custom" target="_blank">Go to Tracer Study</a>
                </div>
                <div class="modal-footer">
                    <!-- Smaller 'Close' button -->
                    <button type="button" class="btn-custom" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script to automatically open the modal on page load -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var myModal = new bootstrap.Modal(document.getElementById('tracerStudyModal'));
            myModal.show();
        });
    </script>
</body>
</html>
