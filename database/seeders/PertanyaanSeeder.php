<?php

namespace Database\Seeders;

use App\Models\Pertanyaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PertanyaanSeeder extends Seeder
{
    public function run()
    {
        $pertanyaan = [
            'Nama Lengkap',
            'Nomor Induk Mahasiswa',
            'Tanggal Lahir',
            'Program Studi',
            'Tahun Lulus',
            'Apakah Anda Melanjutkan Study saat ini?',
            'Sumber Daya',
            'Perguruan Tinggi',
            'Program Studi',
            'Apakah Anda saat ini bekerja?',
            'Apa alasan utama Anda belum bekerja?',
            'Nama Perusahaan',
            'Jabatan',
            'Bagaimana Anda mendapatkan pekerjaan pertama setelah lulus?',
            'Berapa lama waktu yang Anda butuhkan untuk mendapatkan pekerjaan pertama setelah lulus?',
            'Apakah pekerjaan Anda saat ini sesuai dengan bidang studi Anda?',
            'Rata-rata pendapatan Anda perbulan',
            'Keterampilan apa yang Anda peroleh selama studi di Teknik Informatika yang berguna dalam pekerjaan Anda? (Silakan pilih semua yang relevan)',
            'Apakah ada keterampilan tambahan yang Anda pelajari setelah lulus yang berguna dalam pekerjaan Anda?',
            'Seberapa sering Anda menggunakan keterampilan yang Anda peroleh selama studi di Teknik Informatika dalam pekerjaan Anda saat ini?',
            'Bagaimana pendapat Anda mengenai relevansi kurikulum yang diajarkan dengan kebutuhan dunia kerja?',
        ];

        foreach ($pertanyaan as $text) {
            Pertanyaan::create([
                'pertanyaan' => $text,
            ]);
        }
    }
}
