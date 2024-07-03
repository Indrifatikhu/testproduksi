<?php

namespace App\Http\Controllers;

use App\Models\TargetProduksi;
use App\Models\Produksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TargetController extends Controller
{
    public function index() 
    {
        $data_target = TargetProduksi::all();
        return view('pages.target', compact('data_target'));
    }

    public function store(Request $request) {
        // $produksiId = $request->id;
        $request->validate([
            'bulan' => 'required',
            'target_bulanan' => 'required',
            'tahun' => 'required',
            'target_tahunan' => 'required',
            
        ]);
        $target = TargetProduksi::create(
            [
                'bulan' => $request->bulan,
                'target_bulanan' => $request->target_bulanan,
                'tahun' => $request->tahun,
                'target_tahunan' => $request->target_tahunan,
                
                ]
            );

        return back()->with('success', 'Data Target Berhasil Ditambahkan');
    }

    public function edit(Request $request, string $id) {
    
        TargetProduksi::find($id)->update($request->all());

        // Create the success message including the ID
        $successMessage = 'Data id ' . $id . ' Berhasil di Update.';
        
        // Return back with the success message
        return back()->with('success', $successMessage);  
    }
    
    public function destroy($id) {
        TargetProduksi::find($id)->delete();

        // Create the success message including the ID
        $successMessage = 'Data id' . $id . ' Berhasil di Hapus.';
        
        // Return back with the success message
        return back()->with('success', $successMessage);  
    }

    public function getTargets() 
    {
        $targets = TargetProduksi::all();
        $datas = [];
        foreach($targets as $row){
            $realisasiBulanan = Produksi::whereYear('tanggal', $row->tahun)
                                        ->whereMonth('tanggal', $row->bulan)
                                        ->sum('produksi');

            $realisasiTahunan = Produksi::whereYear('tanggal', $row->tahun)
                                        ->sum('produksi'); 

            $persentaseBulanan = $row->target_bulanan > 0 ? ($realisasiBulanan / $row->target_bulanan) * 100 : 0;
            $persentaseTahunan = $row->target_tahunan > 0 ? ($realisasiTahunan / $row->target_tahunan) * 100 : 0;
        
            $datas[] = [
                'id' => $row->id,
                'bulan' => $row->bulan,
                'target_bulanan' => $row->target_bulanan,
                'realisasi_bulanan' => $realisasiBulanan,
                'tahun' => $row->tahun,
                'target_tahunan' => $row->target_tahunan,
                'realisasi_tahunan' => $realisasiTahunan,
                'persentase_bulanan' => round($persentaseBulanan),
                'persentase_tahunan' => round($persentaseTahunan),
            ];
        }
        return response()->json($datas);
    }
}
