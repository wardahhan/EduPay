<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('siswa', function (Blueprint $table) {

            // TAMBAH ALAMAT
            $table->text('alamat')
                  ->after('nama');

            // TAMBAH NO TELP
            $table->string('no_telp', 20)
                  ->after('alamat');

        });
    }

    public function down(): void
    {
        Schema::table('siswa', function (Blueprint $table) {
            $table->dropColumn(['alamat', 'no_telp']);
        });
    }
};
