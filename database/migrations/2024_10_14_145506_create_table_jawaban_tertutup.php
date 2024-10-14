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
        Schema::create('jawaban_tertutup', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('id_kuisioner');
            $table->string('opsi_1', 255);
            $table->string('opsi_2', 255);
            $table->string('opsi_3', 255);
            $table->string('opsi_4', 255);
            $table->string('opsi_5', 255);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jawaban_tertutup');
    }
};
