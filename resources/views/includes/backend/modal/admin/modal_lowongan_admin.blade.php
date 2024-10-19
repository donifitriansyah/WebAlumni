@foreach ($showLowonganDivalidasi as $lowongan)
    <!-- Modal Detail -->
    <div class="modal fade" id="detailModal{{ $lowongan->id_lowongan }}" tabindex="-1"
        aria-labelledby="detailModalLabel{{ $lowongan->id_lowongan }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Detail Lowongan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                            <td>{{ $lowongan->perusahaan->nama_perusahaan}}</td>
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
@endforeach
