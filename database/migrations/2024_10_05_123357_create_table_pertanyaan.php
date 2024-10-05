<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pertanyaan', function (Blueprint $table) {
            $table->id('id_pertanyaan'); // Primary key
            $table->text('pertanyaan'); // Teks pertanyaan
            $table->timestamps(); // Menyimpan timestamp created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('pertanyaan');
    }
};
