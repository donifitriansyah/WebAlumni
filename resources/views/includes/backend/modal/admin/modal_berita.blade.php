@foreach ($berita as $berita)
    <!-- Modal Detail -->
    <div class="modal fade" id="detailModal{{ $berita->id_berita }}" tabindex="-1"
        aria-labelledby="detailModalLabel{{ $berita->id_berita }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Detail Berita</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>ID Berita</th>
                            <td>{{ $berita->id_berita }}</td>
                        </tr>
                        <tr>
                            <th>Judul Berita</th>
                            <td>{{ $berita->judul_berita }}</td>
                        </tr>
                        <tr>
                            <th>Deskripsi berita</th>
                            <td>{{ $berita->deskripsi_berita }}</td>
                        </tr>
                        <tr>
                            <th>Link Berita</th>
                            <td>{{ $berita->link }}</td>
                        </tr>
                        <tr>
                            <th>Gambar</th>
                            <td><img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar Berita"
                                    width="200"></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="editBeritaModal{{ $berita->id_berita }}" tabindex="-1"
        aria-labelledby="editBeritaModalLabel{{ $berita->id_berita }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editBeritaModalLabel{{ $berita->id_berita }}">Edit Data
                        Berita
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('berita.update', $berita->id_berita) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="judul_berita" class="form-label">Judul Berita</label>
                            <input type="text" class="form-control" id="judul_berita" name="judul_berita"
                                value="{{ $berita->judul_berita }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_terbit" class="form-label">Tanggal Terbit</label>
                            <input type="date" class="form-control" id="tanggal_terbit" name="tanggal_terbit"
                                value="{{ $berita->tanggal_terbit }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi_beritlink" class="form-label">Deskripsi Berita</label>
                            <input type="text" class="form-control" id="deskripsi_berita" name="deskripsi_berita"
                                value="{{ $berita->deskripsi_berita }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="link" class="form-label">Link Berita</label>
                            <input type="text" class="form-control" id="link" name="link"
                                value="{{ $berita->link }}" required>
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar">
                            @if ($berita->gambar)
                                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar Berita"
                                    width="100" class="mt-2">
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
