<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\UploadController;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produksi extends Model
{
    use HasFactory;

    protected $table = 'produksi';

    // public $id_produksi = Produksi::select(['produksi.*', DB::raw("CONCAT(produksi.kode_bull, '-', produksi.kode_batch, '-', produksi.produksi) as id_produksi")])->get();

    protected $fillable = [
        'tanggal',
        'nama_bull',
        'kode_bull',
        'bangsa',
        'kode_batch',
        'produksi',
        'ptm',
        'konsentrasi',
    ];

    public function distribusi()
    {
        return $this->hasMany(Distribusi::class, 'id_produksi');
    }
}
