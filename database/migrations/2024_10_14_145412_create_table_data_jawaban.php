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
        Schema::create('data_jawaban', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_kuisioner');  // Changed from id_pertanyaan to id_kuisioner
            $table->string('jawaban_terbuka', 255)->nullable();
            $table->string('jawaban_tertutup', 255)->nullable();
            $table->string('jawaban_skala', 255)->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_kuisioner')->references('id')->on('kuisioner')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_jawaban');  // Changed from table_data_jawaban to data_jawaban
    }
};
