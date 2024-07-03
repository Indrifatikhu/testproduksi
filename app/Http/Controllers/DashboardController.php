<?php

namespace App\Http\Controllers;

use App\Models\Produksi;
use Illuminate\Http\Request;
use App\Models\TargetProduksi;
use App\Models\TargetBangsa;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $allData = Produksi::all();
        
        $targets = TargetBangsa::all();
        $datas = [];
        foreach($targets as $row){
            $realisasiBulanan = Produksi::leftJoin('bull', 'produksi.id_bull', '=', 'bull.id')
                                        ->where('id_bangsa', $row->id_bangsa)
                                        ->whereYear('tanggal', $row->tahun)
                                        ->whereMonth('tanggal', $row->bulan)
                                        ->sum('produksi');

            $realisasiTahunan = Produksi::leftJoin('bull', 'produksi.id_bull', '=', 'bull.id')
                                        ->where('id_bangsa', $row->id_bangsa)
                                        ->whereYear('tanggal', $row->tahun)
                                        ->sum('produksi'); 

            $persentaseBulanan = $row->target_bulanan > 0 ? ($realisasiBulanan / $row->target_bulanan) * 100 : 0;
            $persentaseTahunan = $row->target_tahunan > 0 ? ($realisasiTahunan / $row->target_tahunan) * 100 : 0;
        
            $datas[] = [
                'id' => $row->id,
                'bulan' => $row->bulan,
                'id_bangsa' => $row->id_bangsa,
                'bangsa' => $row->bangsa,
                'target_bulanan' => $row->target_bulanan,
                'realisasi_bulanan' => $realisasiBulanan,
                'tahun' => $row->tahun,
                'target_tahunan' => $row->target_tahunan,
                'realisasi_tahunan' => $realisasiTahunan,
                'persentase_bulanan' => round($persentaseBulanan),
                'persentase_tahunan' => round($persentaseTahunan),
            ];
        }

        return view('pages.dashboard', [
            'allData' => $allData,
            'targetBangsa' => $datas
        ]);
    }
    
    public function getProduksi()
    {
        $produksi = Produksi::all();
        return response()->json($produksi);
    }

    public function getTargets() 
    {
        $targets = TargetProduksi::all();
        return response()->json($targets);
    }


}

// ["tittle"=>"Dashboard"]
