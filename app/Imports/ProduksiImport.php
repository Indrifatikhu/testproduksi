<?php

namespace App\Imports;

use App\Models\Produksi;
use App\Models\Bull;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;

class ProduksiImport implements ToModel, WithHeadingRow, SkipsOnFailure
{
    use SkipsFailures;

    public function model(array $row)
    {
        if (
            !isset($row['kode_bull']) || empty($row['kode_bull']) ||
            !isset($row['kode_batch']) || empty($row['kode_batch']) ||
            !isset($row['tanggal']) || empty($row['tanggal']) ||
            !isset($row['produksi']) || empty($row['produksi']) ||
            !isset($row['ptm']) || empty($row['ptm']) ||
            !isset($row['konsentrasi']) || empty($row['konsentrasi'])
        ) {
            return null;
        }

        $bull = Bull::where('kode_bull', $row['kode_bull'])->first();

        if ($bull) {
            return new Produksi([
                'id_bull' => $bull->id,
                'kode_batch' => $row['kode_batch'],
                'tanggal' => $row['tanggal'],
                'produksi' => $row['produksi'],
                'ptm' => $row['ptm'],
                'konsentrasi' => $row['konsentrasi'],
            ]);
        }

        return null;
    }
}