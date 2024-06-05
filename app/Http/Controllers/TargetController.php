<?php

namespace App\Http\Controllers;

use App\Models\TargetProduksi;
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
        return response()->json($targets);
        // return view('pages.target', compact('targets'));
    }
}
