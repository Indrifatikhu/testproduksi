<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TargetBangsa extends Model
{
    use HasFactory;
    protected $table = 'target_bangsa';
    protected $fillable = [
        'id_bangsa',
        'id_bull',
        'target_bulanan',
        'target_tahunan',
        'bulan',
        'tahun',
    ];

    public function bangsa()
    {
        return $this->belongsTo(Bangsa::class, 'id_bangsa');
    }
}