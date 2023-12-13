<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masuk extends Model
{
    use HasFactory;

    protected $table = "masuk";

    protected $fillable = [
        'id_bbm',
        'keterangan',
        'jumlah'
    ];

    public function bbm()
    {
        return $this->belongsTo(StokBBM::class, 'id_bbm', 'id');
    }
}
