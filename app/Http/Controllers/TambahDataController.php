<?php

namespace App\Http\Controllers;

use App\Models\Produksi;
use Illuminate\Http\Request;

class TambahDataController extends Controller
{
    public function index() 
    {
        return view('add-data.index', ["tittle"=>"Tambah Data"]);
    }

    public function store(Request $request) {
        // $produksiId = $request->id;
        $request->validate([
            'tanggal' => 'required',
            'bangsa' => 'required',
            'nama_bull' => 'required',
            'kode_bull' => 'required',
            'kode_batch' => 'required',
            'produksi' => 'required',
            'ptm' => 'required',
            'konsentrasi' => 'required'
        ]);
        $produksi = Produksi::create(
            [
                'tanggal' => $request->tanggal,
                'bangsa' => $request->bangsa,
                'nama_bull'  => $request->nama_bull,
                'kode_bull' => $request->kode_bull,
                'kode_batch' => $request->kode_batch,
                'produksi' => $request->produksi,
                'ptm' => $request->ptm,
                'konsentrasi' => $request->konsentrasi
                ]
            );

        return back()->with('success', 'Data Produksi Harian Berhasil Ditambahkan');
    }
}
