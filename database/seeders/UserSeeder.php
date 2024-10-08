<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'admin1',
                'email' => 'admin1@mail.com',
                'email_verified_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'password' => Hash::make('password123'), // Use a hashed password
                'role' => 'admin',
                'remember_token' => null,
                'created_at' => Carbon::now(),
            ],
            [
                'username' => 'admin2',
                'email' => 'admin2@mail.com',
                'email_verified_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'password' => Hash::make('password123'), // Use a hashed password
                'role' => 'admin',
                'remember_token' => null,
                'created_at' => Carbon::now(),
            ],
            [
                'username' => 'Septian',
                'email' => 'septian@mail.com',
                'email_verified_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'password' => Hash::make('password123'), // Use a hashed password
                'role' => 'alumni',
                'remember_token' => null,
                'created_at' => Carbon::now(),
            ],
            [
                'username' => 'Ferry',
                'email' => 'ferry@mail.com',
                'email_verified_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'password' => Hash::make('password123'), // Use a hashed password
                'role' => 'alumni',
                'remember_token' => null,
                'created_at' => Carbon::now(),
            ],
            [
                'username' => 'ptmencaricintasejati',
                'email' => 'perusahaan1@mail.com',
                'email_verified_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'password' => Hash::make('password123'), // Use a hashed password
                'role' => 'perusahaan',
                'remember_token' => null,
                'created_at' => Carbon::now(),
            ],
            [
                'username' => 'terusberusahahaha',
                'email' => 'perusahaan2@mail.com',
                'email_verified_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'password' => Hash::make('password123'), // Use a hashed password
                'role' => 'perusahaan',
                'remember_token' => null,
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
