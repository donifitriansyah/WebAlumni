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
        Schema::create('pertanyaan', function (Blueprint $table) {
            $table->id('id_pertanyaan');
            $table->string('pertanyaan'); // The question text
            $table->enum('jenis', ['terbuka', 'skala']); // Type of question
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('pertanyaan');
    }
};
