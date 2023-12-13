<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StokBBM extends Model
{
    use HasFactory;

    protected $table = "stok_bbm";

    protected $fillable = [
        'jenis_kendaraan',
        'stok'
    ];

    public function masuk()
    {
        return $this->hasMany(Masuk::class, 'id_bbm', 'id');
    }

    public function keluar()
    {
        return $this->hasMany(Keluar::class, 'id_bbm', 'id');
    }
}
