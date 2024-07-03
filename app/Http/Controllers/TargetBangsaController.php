<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TargetBangsa;
use App\Models\Bangsa;
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
}