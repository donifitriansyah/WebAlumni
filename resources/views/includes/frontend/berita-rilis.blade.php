<section class="news-section">
    <h2>RILIS BERITA</h2>
    <div class="news-grid">
        @foreach ($berita as $item)
        <div class="news-item">
            <img src="{{ asset('storage/' . $item->gambar) }}" alt="Wisuda PDDKH">
            <div class="news-content">
                <h3 class="news-title">{{ $item->judul_berita }}</h3>
                <p class="news-date"><i class="far fa-clock"></i> {{ $item->tanggal_terbit }}</p>
                <p class="news-excerpt">{{ $item->deskripsi_berita }}</p>
            </div>
        </div>
        @endforeach

    </div>
</section>
