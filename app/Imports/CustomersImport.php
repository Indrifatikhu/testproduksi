<?php

namespace App\Imports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CustomersImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Customer([
            'nama_instansi' => $row['nama_instansi'],
            'alamat' => $row['alamat'],
            'contact_person' => $row['contact_person'],
            'telp' => $row['telp'],
            'provinsi_id' => $row['provinsi_id'],
            'kabupaten_id' => $row['kabupaten_id'],
        ]);
    }
}