<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tracer_study', function (Blueprint $table) {
            $table->id(); // ID untuk tracer study
            $table->foreignId('id_pertanyaan')->constrained('pertanyaan', 'id_pertanyaan')->onDelete('cascade'); // Pastikan mengacu pada kolom yang benar
            $table->foreignId('id_alumni')->constrained('alumni', 'id_alumni')->onDelete('cascade'); // Pastikan mengacu pada kolom yang benar
            $table->string('jawaban'); // Kolom untuk jawaban
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('tracer_study');
    }
};
