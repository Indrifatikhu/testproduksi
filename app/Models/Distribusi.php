<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distribusi extends Model
{
    use HasFactory;
    protected $table = 'distribusi';
    protected $fillable = [
        'id_produksi',
        'tanggal',
        'jumlah',
        'container_id',
        'customer_id'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function produksi()
    {
        return $this->belongsTo(Produksi::class, 'id_produksi');
    }
}