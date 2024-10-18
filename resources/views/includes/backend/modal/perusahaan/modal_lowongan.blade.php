@foreach ($lowongans as $lowongan)
    <!-- Modal Detail -->
    <div class="modal fade" id="detailModal{{ $lowongan->id_lowongan }}" tabindex="-1"
        aria-labelledby="detailModalLabel{{ $lowongan->id_lowongan }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Detail Lowongan</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>ID Lowongan</th>
                            <td>{{ $lowongan->id_lowongan }}</td>
                        </tr>
                        <tr>
                            <th>Perusahaan</th>
                            <td>{{ $lowongan->id_perusahaan }}</td>
                        </tr>
                        <tr>
                            <th>Judul Lowongan</th>
                            <td>{{ $lowongan->judul_lowongan }}</td>
                        </tr>
                        <tr>
                            <th>Posisi Pekerjaan</th>
                            <td>{{ $lowongan->posisi_pekerjaan }}</td>
                        </tr>
                        <tr>
                            <th>Deskripsi Pekerjaan</th>
                            <td>{{ $lowongan->deskripsi_pekerjaan }}</td>
                        </tr>
                        <tr>
                            <th>Gambar</th>
                            <td><img src="{{ asset('storage/' . $lowongan->gambar) }}" alt="Gambar Lowongan"
                                    width="200"></td>
                        </tr>
                        <tr>
                            <th>Tipe Pekerjaan</th>
                            <td>{{ $lowongan->tipe_pekerjaan }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Kandidat</th>
                            <td>{{ $lowongan->jumlah_kandidat }}</td>
                        </tr>
                        <tr>
                            <th>Lokasi</th>
                            <td>{{ $lowongan->lokasi }}</td>
                        </tr>
                        <tr>
                            <th>Rentang Gaji</th>
                            <td>{{ $lowongan->rentang_gaji }}</td>
                        </tr>
                        <tr>
                            <th>Pengalaman Kerja</th>
                            <td>{{ $lowongan->pengalaman_kerja }}</td>
                        </tr>
                        <tr>
                            <th>Kontak</th>
                            <td>{{ $lowongan->kontak }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $lowongan->status }}</td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="editLowonganModal{{ $lowongan->id_lowongan }}" tabindex="-1"
        aria-labelledby="editLowonganModalLabel{{ $lowongan->id_lowongan }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editLowonganModalLabel{{ $lowongan->id_lowongan }}">Edit Data
                        Lowongan
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('lowongan.update', $lowongan->id_lowongan) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Since this is for updating the data -->

                        <div class="mb-3">
                            <label for="judul_lowongan" class="form-label">Judul Lowongan</label>
                            <input type="text" class="form-control" id="judul_lowongan" name="judul_lowongan"
                                value="{{ $lowongan->judul_lowongan }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="posisi_pekerjaan" class="form-label">Posisi Pekerjaan</label>
                            <input type="text" class="form-control" id="posisi_pekerjaan" name="posisi_pekerjaan"
                                value="{{ $lowongan->posisi_pekerjaan }}" required>
                        </div>

                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar">
                            @if ($lowongan->gambar)
                                <img src="{{ asset('storage/' . $lowongan->gambar) }}" alt="Gambar Lowongan"
                                    width="100" class="mt-2">
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi_pekerjaan" class="form-label">Deskripsi Pekerjaan</label>
                            <textarea class="form-control" id="deskripsi_pekerjaan" name="deskripsi_pekerjaan" rows="3" required>{{ $lowongan->deskripsi_pekerjaan }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="tipe_pekerjaan" class="form-label">Tipe Pekerjaan</label>
                            <select class="form-select" id="tipe_pekerjaan" name="tipe_pekerjaan" required>
                                <option value="Full-time"
                                    {{ $lowongan->tipe_pekerjaan == 'Full-time' ? 'selected' : '' }}>Penuh Waktu
                                </option>
                                <option value="Part-time"
                                    {{ $lowongan->tipe_pekerjaan == 'Part-time' ? 'selected' : '' }}>Paruh Waktu
                                </option>
                                <option value="Contract"
                                    {{ $lowongan->tipe_pekerjaan == 'Contract' ? 'selected' : '' }}>
                                    Kontrak</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="jumlah_kandidat" class="form-label">Jumlah Kandidat</label>
                            <input type="number" class="form-control" id="jumlah_kandidat" name="jumlah_kandidat"
                                value="{{ $lowongan->jumlah_kandidat }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="lokasi" class="form-label">Lokasi</label>
                            <input type="text" class="form-control" id="lokasi" name="lokasi"
                                value="{{ $lowongan->lokasi }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="rentang_gaji" class="form-label">Rentang Gaji</label>
                            <input type="text" class="form-control" id="rentang_gaji" name="rentang_gaji"
                                value="{{ $lowongan->rentang_gaji }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="pengalaman_kerja" class="form-label">Pengalaman Kerja</label>
                            <input type="text" class="form-control" id="pengalaman_kerja" name="pengalaman_kerja"
                                value="{{ $lowongan->pengalaman_kerja }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="kontak" class="form-label">Kontak</label>
                            <input type="text" class="form-control" id="kontak" name="kontak"
                                value="{{ $lowongan->kontak }}" required>
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
