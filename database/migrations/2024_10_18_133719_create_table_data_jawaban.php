<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() {
        Schema::create('data_jawaban', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_alumni')->constrained('alumni', 'id_alumni')->onDelete('cascade'); // Link directly to alumni
            $table->foreignId('id_pertanyaan')->constrained('pertanyaan', 'id_pertanyaan')->onDelete('cascade'); // Reference to the question
            $table->text('jawaban_terbuka')->nullable(); // Open-ended response
            $table->integer('jawaban_skala')->nullable(); // Scale rating response (1-5)
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('data_jawaban');
    }
};
