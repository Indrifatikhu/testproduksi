<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TargetProduksi extends Model
{
    use HasFactory;
    protected $table = 'target';
    protected $fillable = ['bulan', 'target_bulanan', 'tahun', 'target_tahunan'];
}