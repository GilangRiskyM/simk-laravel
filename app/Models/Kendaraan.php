<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $table = "kendaraan";

    protected $fillable = [
        'nopol',
        'merek',
        'jenis_kendaraan',
        'nama_pegawai',
        'nip',
        'jabatan'
    ];
}
