<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AlumniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alumni')->insert([
            [
                'id_user' => 3, // Assuming this user ID exists in the users table
                'nama_alumni' => 'Septian',
                'nim' => '320211000',
                'tanggal_lahir' => '1990-01-01',
                'alamat' => '123 Main St, Jakarta',
                'no_tlp' => '08123456789',
                'email' => 'septian@mail.com',
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_user' => 4,
                'nama_alumni' => 'Ferry',
                'nim' => '320210000',
                'tanggal_lahir' => '1992-05-15',
                'alamat' => '456 Elm St, Bandung',
                'no_tlp' => '08234567890',
                'email' => 'ferry@mail.com',
                'status' => 'inactive',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Add more alumni records as needed
        ]);
    }
}
