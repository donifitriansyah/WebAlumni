<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('alumni', function (Blueprint $table) {
        $table->dropColumn('username'); // Hapus kolom username
    });
}

public function down()
{
    Schema::table('alumni', function (Blueprint $table) {
        $table->string('username')->after('id_user'); // Jika rollback, tambahkan kolom kembali
    });
}

};
