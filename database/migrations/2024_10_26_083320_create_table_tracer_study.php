<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up() {
        Schema::create('tracer_study', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_alumni')->constrained('alumni', 'id_alumni')->onDelete('cascade');
            $table->foreignId('id_pertanyaan')->constrained('pertanyaan', 'id_pertanyaan')->onDelete('cascade');
            $table->string('jawaban'); // Stores answers as text
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('tracer_study');
    }
};
