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
        Schema::create('kendaraan', function (Blueprint $table) {
            $table->id();
            $table->string('nopol')->nullable(false);
            $table->string('merek')->nullable(false);
            $table->string('jenis_kendaraan')->nullable(false);
            $table->string('nama_pegawai')->nullable(false);
            $table->string('nip')->nullable(false);
            $table->string('jabatan')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraan');
    }
};
