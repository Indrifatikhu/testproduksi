<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TargetBangsa;
use App\Models\Bangsa;
use App\Models\Bull;
use App\Models\Produksi;
use Illuminate\Support\Facades\DB;

class TargetBangsaController extends Controller
{
    public function index()
    {
        $targetbangsa = DB::table('target_bangsa as tb')
                        ->join('bangsa as b', 'tb.id_bangsa', '=', 'b.id')
                        ->select('tb.*', 'b.bangsa')->get();
                        
        $bangsa = Bangsa::all();
        return view('pages.targetbangsa', [
            'bangsa' => $bangsa,
            'targetbangsa' => $targetbangsa
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_bangsa' => 'required|integer',
            'target_bulanan' => 'required|integer',
            'target_tahunan' => 'required|integer',
            'bulan' => 'required|integer',
            'tahun' => 'required|integer',
        ]);

        $targetBangsa = new TargetBangsa([
            'id_bangsa' => $request->get('id_bangsa'),
            'target_bulanan' => $request->get('target_bulanan'),
            'target_tahunan' => $request->get('target_tahunan'),
            'bulan' => $request->get('bulan'),
            'tahun' => $request->get('tahun'),
        ]);

        $targetBangsa->save();
        return back()->with('success', 'Data Target Bangsa Berhasil Ditambahkan');
    }

    public function edit(Request $request, string $id) 
    {
        TargetBangsa::find($id)->update($request->all());
        $successMessage = 'Data id ' . $id . ' Berhasil di Update.';
        return back()->with('success', $successMessage);  
    }

    public function destroy($id) 
    {
        TargetBangsa::find($id)->delete();
        $successMessage = 'Data id' . $id . ' Berhasil di Hapus.';
        return back()->with('success', $successMessage);  
    }

    public function reportDetail($id)
    {
        $targetBangsa = TargetBangsa::find($id);
        $bulls = Bull::where('id_bangsa', $targetBangsa->id_bangsa)->get();

        $datas = [];
        foreach ($bulls as $bull) {
            $realisasiBulanan = [
                'january' => Produksi::where('id_bull', $bull->id)->whereMonth('tanggal', 1)->whereYear('tanggal', $targetBangsa->tahun)->sum('produksi'),
                'february' => Produksi::where('id_bull', $bull->id)->whereMonth('tanggal', 2)->whereYear('tanggal', $targetBangsa->tahun)->sum('produksi'),
                'march' => Produksi::where('id_bull', $bull->id)->whereMonth('tanggal', 3)->whereYear('tanggal', $targetBangsa->tahun)->sum('produksi'),
                'april' => Produksi::where('id_bull', $bull->id)->whereMonth('tanggal', 4)->whereYear('tanggal', $targetBangsa->tahun)->sum('produksi'),
                'may' => Produksi::where('id_bull', $bull->id)->whereMonth('tanggal', 5)->whereYear('tanggal', $targetBangsa->tahun)->sum('produksi'),
                'june' => Produksi::where('id_bull', $bull->id)->whereMonth('tanggal', 6)->whereYear('tanggal', $targetBangsa->tahun)->sum('produksi'),
                'july' => Produksi::where('id_bull', $bull->id)->whereMonth('tanggal', 7)->whereYear('tanggal', $targetBangsa->tahun)->sum('produksi'),
                'august' => Produksi::where('id_bull', $bull->id)->whereMonth('tanggal', 8)->whereYear('tanggal', $targetBangsa->tahun)->sum('produksi'),
                'september' => Produksi::where('id_bull', $bull->id)->whereMonth('tanggal', 9)->whereYear('tanggal', $targetBangsa->tahun)->sum('produksi'),
                'october' => Produksi::where('id_bull', $bull->id)->whereMonth('tanggal', 10)->whereYear('tanggal', $targetBangsa->tahun)->sum('produksi'),
                'november' => Produksi::where('id_bull', $bull->id)->whereMonth('tanggal', 11)->whereYear('tanggal', $targetBangsa->tahun)->sum('produksi'),
                'december' => Produksi::where('id_bull', $bull->id)->whereMonth('tanggal', 12)->whereYear('tanggal', $targetBangsa->tahun)->sum('produksi'),
            ];

            $realisasiTahunan = array_sum($realisasiBulanan);

            $datas[] = [
                'bull' => $bull->bull,
                'realisasi_bulanan' => $realisasiBulanan,
                'realisasi_tahunan' => $realisasiTahunan
            ];
        }
        return response()->json($datas);
    }
}