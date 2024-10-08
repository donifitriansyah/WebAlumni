<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     Schema::create('perusahaan', function (Blueprint $table) {
    //         $table->id('id_perusahaan');
    //         $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
    //         $table->string('nama_perusahaan', length:255);
    //         $table->string('nib', length:255)->unique();
    //         $table->string('email_perusahaan', length:255);
    //         $table->string('sektor_bisnis');
    //         $table->string('deskripsi_perusahaan');
    //         $table->string('jumlah_karyawan');
    //         $table->string('no_telp');
    //         $table->string('website_perusahaan',255);
    //         $table->timestamps();
    //     });
    // }

    public function up(): void
{
    if (!Schema::hasTable('perusahaan')) {
        Schema::create('perusahaan', function (Blueprint $table) {
            $table->id('id_perusahaan');
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->string('nama_perusahaan', 255);
            $table->string('nib', 255)->unique();
            $table->string('alamat', 255);
            $table->string('email_perusahaan', 255);
            $table->string('sektor_bisnis');
            $table->string('deskripsi_perusahaan');
            $table->string('jumlah_karyawan');
            $table->string('no_telp');
            $table->string('website_perusahaan', 255);
            $table->timestamps();
        });
    }
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perusahaan');
    }
};
