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
        Schema::create('lamaran', function (Blueprint $table) {
            $table->id('id_lamaran');
            $table->unsignedBigInteger('id_lowongan'); // Define the foreign key column for lowongan
            $table->unsignedBigInteger('id_alumni'); // Define the foreign key column for alumni
            $table->string('nama');
            $table->string('email');
            $table->string('cv');
            $table->string('transkrip_nilai')->nullable();
            $table->string('portofolio')->nullable();
            $table->enum('status', ['terima', 'tolak', 'menunggu'])->default('menunggu');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('id_lowongan')->references('id_lowongan')->on('lowongan')->onDelete('cascade');
            $table->foreign('id_alumni')->references('id_alumni')->on('alumni')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lamaran');
    }
};
