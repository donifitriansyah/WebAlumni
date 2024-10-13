<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lowongan', function (Blueprint $table) {
            $table->id('id_lowongan');
            $table->foreignId('id_perusahaan'); // Foreign key to 'perusahaan' table
            $table->string('judul_lowongan');
            $table->string('posisi_pekerjaan');
            $table->text('deskripsi_pekerjaan');
            $table->enum('tipe_pekerjaan', ['full-time', 'part-time', 'freelance', 'contract']); // assuming some job types
            $table->integer('jumlah_kandidat');
            $table->string('lokasi');
            $table->date('tanggal_aktif');
            $table->string('rentang_gaji');
            $table->string('pengalaman_kerja');
            $table->string('kontak');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_lowongans');
    }
};
