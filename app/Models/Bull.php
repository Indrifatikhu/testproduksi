<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Bull extends Model
{
    use HasFactory;
    protected $table = 'bull';
    protected $fillable = [
        'id_bangsa',
        'kode_bull',
        'bull',
        'tanggal_lahir',
        'status',
        'keterangan'
    ];

    public function bangsa()
    {
        return $this->belongsTo(Bangsa::class, 'id_bangsa');
    }
}