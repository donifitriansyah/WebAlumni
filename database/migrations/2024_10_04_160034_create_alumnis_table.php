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
        Schema::create('alumni', function (Blueprint $table) {
            $table->id('id_alumni');
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->string('nama_alumni', 255);
            $table->string('nim',255);
            $table->date('tanggal_lahir');
            $table->string('alamat', 255);
            $table->string('no_tlp', 15);
            $table->string('email', 255)->unique();
            $table->enum('status', ['pasif' , 'aktif'])->default('pasif');
            $table->string('gambar', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumni');
    }
};
