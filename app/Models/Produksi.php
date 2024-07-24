<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produksi extends Model
{
    use HasFactory;

    protected $table = 'produksi';

    protected $fillable = [
        'id_bull',
        'kode_batch',
        'tanggal',
        'produksi',
        'ptm',
        'konsentrasi',
        'container_id'
    ];

    public function distribusi()
    {
        return $this->hasMany(Distribusi::class, 'id_produksi');
    }
}
