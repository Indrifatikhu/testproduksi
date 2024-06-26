<?php

namespace App\Imports;

use App\Models\Produksi;
use Maatwebsite\Excel\Excel;
use Illuminate\Support\Collection;
use App\Http\Controllers\UploadController;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProduksiImport implements ToCollection, WithHeadingRow 
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            Produksi::create([
                'tanggal' => $row['tanggal'],
                'kode_bull' => $row['kode_bull'],
                'bangsa' => $row['bangsa'],
                'kode_batch' => $row['kode_batch'],
                'produksi'  => $row['produksi'],
                'ptm'       => $row['ptm'],
                'konsentrasi'=> $row['konsentrasi']
            ]);
        }
    }
}