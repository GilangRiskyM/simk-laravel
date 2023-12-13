<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratTugas extends Model
{
    use HasFactory;

    protected $table = "surat_tugas";

    protected $fillable = [
        'nopol',
        'jenis_kendaraan',
        'nama_pegawai',
        'nip',
        'jabatan',
        'keperluan',
        'keperluan_2',
        'penumpang',
        'nama_camat',
        'nip_camat',
        'tanggal',
        'waktu_huruf',
        'waktu_angka',
        'nama_kasubbag',
        'nilai_voucher',
        'jumlah_bbm',
        'harga_bbm'
    ];
}
