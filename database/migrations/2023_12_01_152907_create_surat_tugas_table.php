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
        Schema::create('surat_tugas', function (Blueprint $table) {
            $table->id();
            $table->string('nopol');
            $table->string('jenis_kendaraan');
            $table->string('nama_pegawai');
            $table->string('nip');
            $table->string('jabatan');
            $table->string('keperluan');
            $table->string('keperluan_2')->nullable(true);
            $table->string('penumpang');
            $table->string('nama_camat')->nullable(true);
            $table->string('nip_camat')->nullable(true);
            $table->string('tanggal');
            $table->string('waktu_huruf');
            $table->string('waktu_angka');
            $table->string('nama_kasubbag');
            $table->string('nilai_voucher');
            $table->string('jumlah_bbm');
            $table->string('harga_bbm');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_tugas');
    }
};
