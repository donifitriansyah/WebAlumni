<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
            [
                'id_user' => 1,
                'nama' => 'Admin Kamboja',
                'nomor_induk' => '123456',
                'no_hp' => '08123456789',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_user' => 2,
                'nama' => 'Admin',
                'nomor_induk' => '654321',
                'no_hp' => '08234567890',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_user' => 9,
                'nama' => 'adminmikasa',
                'nomor_induk' => '6696969',
                'no_hp' => '08234567899',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Add more admin records as needed
        ]);
    }
}
