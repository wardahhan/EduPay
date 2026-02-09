<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
    Schema::table('siswa', function (Blueprint $table) {
        $table->string('bantuan', 30)->nullable()->after('alamat');
    });
}

public function down(): void
{
    Schema::table('siswa', function (Blueprint $table) {
        $table->dropColumn('bantuan');
    });
}

};
