<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distribusi extends Model
{
    use HasFactory;
    protected $table = 'distribusi';
    protected $fillable = [
        'id_bangsa', 
        'bangsa', 
        'kode_batch', 
        'kode_bull', 
        'nama_bull', 
        'tgl_distribusi', 
        'jml_distribusi', 
        'tujuan_distribusi',
        'container'
    ];
}