<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('petugas', function (Blueprint $table) {
            $table->increments('id_petugas');
            $table->string('nama_petugas', 100);
            $table->string('no_telp', 20)->nullable();

            // level khusus petugas (opsional)
            $table->enum('level', ['admin', 'petugas'])->default('petugas');

            // relasi ke users
            $table->unsignedInteger('id_user')->unique();
            $table->foreign('id_user')
                  ->references('id_user')->on('users')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('petugas');
    }
};

