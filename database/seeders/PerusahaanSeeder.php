<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PerusahaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('perusahaan')->insert([
            [
                'id_user' => 5,
                'nama_perusahaan' => 'PT. Mencari Cinta Sejati',
                'nib' => '123456789',
                'alamat' => 'Jalan Contoh No. 1, Pinyuh',
                'email_perusahaan' => 'info@contohperusahaan.com',
                'sektor_bisnis' => 'Teknologi',
                'deskripsi_perusahaan' => 'Perusahaan yang bergerak di bidang teknologi informasi.',
                'jumlah_karyawan' => 50,
                'no_telp' => '021-12345678',
                'website_perusahaan' => 'www.contohperusahaan.com',
                'status' => 'menunggu', // Add the status field
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_user' => 6,
                'nama_perusahaan' => 'CV. Terus Berusahahaha',
                'nib' => '987654321',
                'alamat' => 'Jalan Usaha No. 2, Kakap',
                'email_perusahaan' => 'info@contohusaha.com',
                'sektor_bisnis' => 'Perdagangan',
                'deskripsi_perusahaan' => 'Perusahaan perdagangan yang sudah berpengalaman.',
                'jumlah_karyawan' => 30,
                'no_telp' => '022-87654321',
                'website_perusahaan' => 'www.contohusaha.com',
                'status' => 'diterima', // Add the status field
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'id_user' => 7,
                'nama_perusahaan' => 'CV. Capek Pak',
                'nib' => '987654121',
                'alamat' => 'Jalan Usaha No. 3, Kakap',
                'email_perusahaan' => 'info@capek.com',
                'sektor_bisnis' => 'Kesehatan Mental',
                'deskripsi_perusahaan' => 'Memperbaiki Kesehatan Mental Kelompok Alumni dan Job karir.',
                'jumlah_karyawan' => 5,
                'no_telp' => '022-87654222',
                'website_perusahaan' => 'www.mentalhealth.com',
                'status' => 'ditolak', // Add the status field
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            // Add more records as needed
        ]);
    }
}
