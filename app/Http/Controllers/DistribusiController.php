<?php

namespace App\Http\Controllers;

use App\Models\Distribusi;
use Illuminate\Http\Request;
use App\Models\Produksi;

class DistribusiController extends Controller
{
    public function index()
    {
        $data_distribusi = Distribusi::all();
        $allData = Produksi::all();
        return view('pages.cart', compact('data_distribusi', 'allData'));
    }

    public function store(Request $request) 
    {
        $request->validate([
            'bangsa' => 'required', 
            'kode_batch' => 'required', 
            'kode_bull' => 'required', 
            'nama_bull' => 'required', 
            'tgl_distribusi' => 'required', 
            'jml_distribusi' => 'required', 
            'tujuan_distribusi' => 'required',
            'container' => 'required',
        ]);
        $distribusi = Distribusi::create(
            [
                'bangsa'=> $request->bangsa, 
                'kode_batch'=> $request->kode_batch, 
                'kode_bull'=> $request->kode_bull, 
                'nama_bull'=> $request->nama_bull, 
                'tgl_distribusi'=> $request->tgl_distribusi, 
                'jml_distribusi'=> $request->jml_distribusi, 
                'tujuan_distribusi'=> $request->tujuan_distribusi,
                'container'=> $request->container,
                ]
            );

        return back()->with('success', 'Data Distribusi Berhasil Ditambahkan');
    }

    public function edit(Request $request, string $id) {
    
        Distribusi::find($id)->update($request->all());

        // Create the success message including the ID
        $successMessage = 'Data ' . $id . ' Berhasil di Update.';
        
        // Return back with the success message
        return back()->with('success', $successMessage);  
    }
    
    public function destroy($id) {
        Distribusi::find($id)->delete();

        // Create the success message including the ID
        $successMessage = 'Data ' . $id . ' Berhasil di Hapus.';
        
        // Return back with the success message
        return back()->with('success', $successMessage);  
    }
}
