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
                            <th>Nama Perusahaan</th>
                            <td>{{ $lowongan->nama_perusahaan}}</td>
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
                <h5 class="modal-title" id="editLowonganModalLabel{{ $lowongan->id_lowongan }}">Edit Data Lowongan</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('lowongan.update', $lowongan->id_lowongan) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="judul_lowongan" class="form-label">Judul Lowongan</label>
                        <input type="text" class="form-control @error('judul_lowongan') is-invalid @enderror" id="judul_lowongan" name="judul_lowongan"
                            value="{{ old('judul_lowongan', $lowongan->judul_lowongan) }}" required>
                        @error('judul_lowongan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="posisi_pekerjaan" class="form-label">Posisi Pekerjaan</label>
                        <input type="text" class="form-control @error('posisi_pekerjaan') is-invalid @enderror" id="posisi_pekerjaan" name="posisi_pekerjaan"
                            value="{{ old('posisi_pekerjaan', $lowongan->posisi_pekerjaan) }}" required>
                        @error('posisi_pekerjaan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar">
                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        @if ($lowongan->gambar)
                            <img src="{{ asset('storage/' . $lowongan->gambar) }}" alt="Gambar Lowongan" width="100" class="mt-2">
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi_pekerjaan" class="form-label">Deskripsi Pekerjaan</label>
                        <textarea class="form-control @error('deskripsi_pekerjaan') is-invalid @enderror" id="deskripsi_pekerjaan" name="deskripsi_pekerjaan" rows="3" required>{{ old('deskripsi_pekerjaan', $lowongan->deskripsi_pekerjaan) }}</textarea>
                        @error('deskripsi_pekerjaan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tipe_pekerjaan" class="form-label">Tipe Pekerjaan</label>
                        <select class="form-select @error('tipe_pekerjaan') is-invalid @enderror" id="tipe_pekerjaan" name="tipe_pekerjaan" required>
                            <option value="Full-time" {{ old('tipe_pekerjaan', $lowongan->tipe_pekerjaan) == 'Full-time' ? 'selected' : '' }}>Penuh Waktu</option>
                            <option value="Part-time" {{ old('tipe_pekerjaan', $lowongan->tipe_pekerjaan) == 'Part-time' ? 'selected' : '' }}>Paruh Waktu</option>
                            <option value="Contract" {{ old('tipe_pekerjaan', $lowongan->tipe_pekerjaan) == 'Contract' ? 'selected' : '' }}>Kontrak</option>
                        </select>
                        @error('tipe_pekerjaan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jumlah_kandidat" class="form-label">Jumlah Kandidat</label>
                        <input type="number" class="form-control @error('jumlah_kandidat') is-invalid @enderror" id="jumlah_kandidat" name="jumlah_kandidat"
                            value="{{ old('jumlah_kandidat', $lowongan->jumlah_kandidat) }}" required>
                        @error('jumlah_kandidat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Lokasi</label>
                        <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi"
                            value="{{ old('lokasi', $lowongan->lokasi) }}" required>
                        @error('lokasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="rentang_gaji" class="form-label">Rentang Gaji</label>
                        <input type="text" class="form-control @error('rentang_gaji') is-invalid @enderror" id="rentang_gaji" name="rentang_gaji"
                            value="{{ old('rentang_gaji', $lowongan->rentang_gaji) }}" required>
                        @error('rentang_gaji')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="pengalaman_kerja" class="form-label">Pengalaman Kerja</label>
                        <input type="text" class="form-control @error('pengalaman_kerja') is-invalid @enderror" id="pengalaman_kerja" name="pengalaman_kerja"
                            value="{{ old('pengalaman_kerja', $lowongan->pengalaman_kerja) }}" required>
                        @error('pengalaman_kerja')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="kontak" class="form-label">Kontak</label>
                        <input type="text" class="form-control @error('kontak') is-invalid @enderror" id="kontak" name="kontak"
                            value="{{ old('kontak', $lowongan->kontak) }}" required>
                        @error('kontak')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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
@if ($errors->any())
<script>
    // Buka modal jika ada error di dalam form yang diposting
    $(document).ready(function() {
        $('#editLowonganModal{{ old('id_lowongan') }}').modal('show');
    });
</script>
@endif
