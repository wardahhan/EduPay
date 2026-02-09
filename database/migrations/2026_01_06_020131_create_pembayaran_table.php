<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->increments('id_pembayaran');

            $table->unsignedInteger('id_petugas')->nullable();
            $table->unsignedInteger('id_siswa');
            $table->date('tanggal_bayar')->nullable();
            $table->string('bulan_bayar', 20);
            $table->integer('tahun_bayar');
            $table->unsignedInteger('id_spp')->nullable();
            $table->integer('jumlah_bayar');

            $table->foreign('id_petugas')
                ->references('id_petugas')->on('petugas')
                ->onUpdate('cascade')->onDelete('set null');

            $table->foreign('id_siswa')
                ->references('id_siswa')->on('siswa')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('id_spp')
                ->references('id_spp')->on('spp')
                ->onUpdate('cascade')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
