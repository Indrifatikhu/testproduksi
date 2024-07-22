<?php

namespace App\Exports;

use App\Models\Distribusi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DistribusiExport implements FromCollection, WithHeadings, WithMapping
{
    protected $startDate;
    protected $endDate;

    public function __construct($startDate, $endDate = null)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function collection()
    {
        $query = Distribusi::select('distribusi.id', 'distribusi.id_produksi', 'distribusi.tanggal',  
                                    'bangsa.bangsa', 'bull.bull', 'bull.kode_bull', 'produksi.kode_batch', 
                                    'distribusi.jumlah', 'containers.nama_container', 'containers.type_container',
                                    'produksi.ptm', 'provinces.name as provinsi', 
                                    'regencies.name as kabupaten', 'customers.nama_instansi', 'customers.alamat', 
                                    'customers.contact_person', 'customers.telp')
                            ->leftJoin('containers', 'distribusi.container_id', '=', 'containers.id')
                            ->leftJoin('customers', 'distribusi.customer_id', '=', 'customers.id')
                            ->leftJoin('provinces', 'customers.provinsi_id', '=', 'provinces.id')
                            ->leftJoin('regencies', 'customers.kabupaten_id', '=', 'regencies.id')
                            ->leftJoin('produksi', 'distribusi.id_produksi', '=', 'produksi.id')
                            ->leftJoin('bull', 'produksi.id_bull', '=', 'bull.id')
                            ->leftJoin('bangsa', 'bull.id_bangsa', '=', 'bangsa.id');

        if ($this->endDate) {
            $query->whereBetween('distribusi.tanggal', [$this->startDate, $this->endDate]);
        } else {
            $query->whereDate('distribusi.tanggal', $this->startDate);
        }

        return $query->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Tanggal',
            'Bangsa',
            'Bull',
            'Kode Bull',
            'Kode Batch',
            'Jumlah',
            'Container',
            'PTM',
            'Provinsi',
            'Kabupaten',
            'Nama Instansi',
            'Alamat',
            'Contact Person',
            'Telp',
        ];
    }

    public function map($row): array
    {
        static $rowNumber = 0;
        $rowNumber++;

        return [
            $rowNumber,
            $row->tanggal,
            $row->bangsa,
            $row->bull,
            $row->kode_bull,
            $row->kode_batch,
            $row->jumlah,
            $row->nama_container . '/' . $row->type_container,
            $row->ptm,
            $row->provinsi,
            $row->kabupaten,
            $row->nama_instansi,
            $row->alamat,
            $row->contact_person,
            $row->telp,
        ];
    }
}
