<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('spp', function (Blueprint $table) {
            $table->string('bantuan')->default('Lengkap')->change();
        });
    }

    public function down(): void
    {
        Schema::table('spp', function (Blueprint $table) {
            $table->integer('bantuan')->default(0)->change();
        });
    }
};
