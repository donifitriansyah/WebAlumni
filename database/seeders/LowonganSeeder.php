<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LowonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lowongan')->insert([
            [
                'id_perusahaan' => 1,
                'judul_lowongan' => 'Software Engineer',
                'posisi_pekerjaan' => 'Backend Developer',
                'deskripsi_pekerjaan' => 'Mengembangkan dan memelihara API backend.',
                'tipe_pekerjaan' => 'Full-time',
                'jumlah_kandidat' => 3,
                'lokasi' => 'Jakarta',
                'rentang_gaji' => '8000000-12000000',
                'pengalaman_kerja' => 'Minimal 2 tahun',
                'kontak' => 'hr@example.com',
                'status' => 'menunggu',
                'tanggal_aktif' => Carbon::now(),
            ],
            [
                'id_perusahaan' => 2,
                'judul_lowongan' => 'UI/UX Designer',
                'posisi_pekerjaan' => 'Designer',
                'deskripsi_pekerjaan' => 'Bertanggung jawab untuk mendesain antarmuka pengguna aplikasi.',
                'tipe_pekerjaan' => 'Part-time',
                'jumlah_kandidat' => 2,
                'lokasi' => 'Bandung',
                'rentang_gaji' => '5000000-8000000',
                'pengalaman_kerja' => 'Minimal 1 tahun',
                'kontak' => 'recruitment@example.com',
                'status' => 'menunggu',
                'tanggal_aktif' => Carbon::now(),
            ],
            // Tambahkan data lain sesuai kebutuhan
        ]);
    }
}
