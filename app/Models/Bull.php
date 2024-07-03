<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bull extends Model
{
    use HasFactory;
    protected $table = 'bull';
    protected $fillable = [
        'id_bangsa',
        'kode_bull',
        'bull'
    ];

    public function bangsa()
    {
        return $this->belongsTo(Bangsa::class, 'id_bangsa');
    }
}