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
        Schema::create('pajak', function (Blueprint $table) {
            $table->id();
            $table->string('merek');
            $table->string('nopol');
            $table->string('tahun_kendaraan');
            $table->string('jatuh_tempo');
            $table->string('lima_tahun_awal');
            $table->string('lima_tahun_akhir');
            $table->string('keterangan')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pajak');
    }
};
