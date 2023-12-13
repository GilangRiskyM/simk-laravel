<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pajak extends Model
{
    use HasFactory;

    protected $table = "pajak";

    protected $fillable = [
        'merek',
        'nopol',
        'tahun_kendaraan',
        'jatuh_tempo',
        'lima_tahun_awal',
        'lima_tahun_akhir',
        'keterangan'
    ];
}
