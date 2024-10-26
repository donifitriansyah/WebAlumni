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
        Schema::create('lamarans', function (Blueprint $table) {
            $table->id('id_lamaran');
            $table->unsignedBigInteger('id_alumni');
            $table->unsignedBigInteger('id_lowongan');
            $table->foreign('id_lowongan')->references('id_lowongan')->on('lowongan')->onDelete('cascade');
            $table->string('nama');
            $table->string('email');
            $table->string('cv'); // Path untuk file CV yang diunggah
            $table->string('transkrip_nilai')->nullable();
            $table->string('portopolio')->nullable();
            $table->enum('status', ['terima','tolak','menunggu'])->default('menunggu');
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_lamarans');
    }
};
