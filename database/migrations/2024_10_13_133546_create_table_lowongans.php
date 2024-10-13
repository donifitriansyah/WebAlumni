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
            $table->unsignedBigInteger('id_perusahaan') -> constrained('perusahaan')->onDelete('cascade');
            $table->string('judul_lowongan');
            $table->string('posisi_pekerjaan');
            $table->text('deskripsi_pekerjaan');
            $table->enum('tipe_pekerjaan', ['Full-time', 'Part-time', 'Contract']);
            $table->integer('jumlah_kandidat');
            $table->string('lokasi');
            $table->string('rentang_gaji');
            $table->string('pengalaman_kerja');
            $table->string('kontak');
            $table->enum('status', ['menunggu', 'diterima', 'ditolak'])->default('menunggu');
            $table->timestamp('tanggal_aktif')->nullable();
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
