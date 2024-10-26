<section id="bagian-job">
    <h2>Alumni</h2>
    <div class="alumni-list">
        @foreach ($alumni as $item)

            <div class='alumni-item'>
            <img src="{{ asset('storage/' . $item->gambar) }}" alt="gambar alumni" style=" width: 248px; height: 160px;">
            <h3 style="margin-top: 40px">{{$item->nama_alumni}}</h3>
            <p>{{$item->nim}}</p>
            </div>
        @endforeach
    </div>

    <div class="pagination" style="margin-top:50px">
    {{-- Loop untuk menampilkan nomor halaman --}}
    @for ($page = 1; $page <= $alumni->lastPage(); $page++)
        @if ($page == $alumni->currentPage())
            <span>{{ $page }}</span> {{-- Halaman aktif tanpa link --}}
        @else
            <a href="{{ $alumni->url($page) }}">{{ $page }}</a>
        @endif
    @endfor
</div>

</section>
