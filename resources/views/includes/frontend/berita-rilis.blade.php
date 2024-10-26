<section class="news-section">
    <h2>RILIS BERITA</h2>
    <div class="news-grid">
        @foreach ($berita as $item)
        <div class="news-item">
            <img src="{{ asset('storage/' . $item->gambar) }}" alt="Wisuda PDDKH">
            <div class="news-content">
                <h3 class="news-title"><a href="{{ $item->link }}">{{ $item->judul_berita }}</a></h3>
                <p class="news-date">
                    <i class="far fa-clock"></i> {{ \Carbon\Carbon::parse($item->tanggal_terbit)->translatedFormat('d F Y') }}
                </p>
                <p class="news-excerpt">
                    {{ Str::words($item->deskripsi_berita, 100, '...') }}
                </p>
            </div>
        </div>
        @endforeach
    </div>
</section>
