<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('alumni', function (Blueprint $table) {
        $table->string('username')->after('id_user'); // Tambahkan username setelah id_user
    });
}

public function down()
{
    Schema::table('alumni', function (Blueprint $table) {
        $table->dropColumn('username'); // Drop kolom jika rollback
    });
}

};
