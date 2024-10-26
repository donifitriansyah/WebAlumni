<section id="bagian-job">
    <h2>Lowongan Pekerjaan</h2>
    <div class="job-list">
        @foreach ($loker as $item)
        <div class="job-item">
            <img src="{{ asset('storage/' . $item->gambar) }}" alt="Technical Oracle Support">
            <h3><a href="">{{$item->perusahaan->nama_perusahaan}}</a></h3>
            <p>{{$item->judul_lowongan}}</p>
        </div>
        @endforeach

    </div>
    <a href="job.html" class="btn">Selengkapnya →</a>
</section>
