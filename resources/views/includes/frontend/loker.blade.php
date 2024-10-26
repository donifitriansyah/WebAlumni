<h2>Lowongan Pekerjaan</h2>
<div class="job-list">
    @foreach ($loker as $item)
        <div class="job-item">
            <img src="{{ asset('storage/' . $item->gambar) }}" alt="Technical Oracle Support">
            <h3>
                <a href="{{ route('loker.detail', ['id_lowongan' => $item->id_lowongan]) }}">
                    {{ $item->perusahaan->nama_perusahaan }}
                </a>
            </h3>
            <p>{{ $item->judul_lowongan }}</p>
            <p class="location">{{ $item->lokasi }}</p>
        </div>
    @endforeach

</div>
