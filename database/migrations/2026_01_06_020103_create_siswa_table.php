<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->increments('id_siswa');
            $table->string('nis', 20)->unique();
            $table->string('nama', 100);

            $table->unsignedInteger('id_kelas')->nullable();
            $table->unsignedInteger('id_spp')->nullable();
            $table->unsignedInteger('id_user')->nullable();

            $table->foreign('id_kelas')
                ->references('id_kelas')->on('kelas')
                ->onUpdate('cascade')->onDelete('set null');

            $table->foreign('id_spp')
                ->references('id_spp')->on('spp')
                ->onUpdate('cascade')->onDelete('set null');

            $table->foreign('id_user')
                ->references('id_user')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
