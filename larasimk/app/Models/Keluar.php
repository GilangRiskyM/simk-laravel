<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluar extends Model
{
    use HasFactory;

    protected $table = "keluar";

    protected $fillable = [
        'id_bbm',
        'nopol',
        'jenis_kendaraan',
        'nama_pegawai',
        'nip',
        'jabatan',
        'jumlah'
    ];

    public function bbm()
    {
        return $this->belongsTo(StokBBM::class, 'id_bbm', 'id');
    }
}
