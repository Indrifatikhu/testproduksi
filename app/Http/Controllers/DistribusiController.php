<?php

namespace App\Http\Controllers;

use App\Models\Distribusi;
use Illuminate\Http\Request;
use App\Models\Produksi;
use Illuminate\Support\Facades\DB;

class DistribusiController extends Controller
{
    public function index()
    {
        $distribusi = Distribusi::select('distribusi.*', 'bangsa.bangsa', 'bull.bull', 'bull.kode_bull', 'produksi.kode_batch')
                                ->leftJoin('produksi', 'distribusi.id_produksi', '=', 'produksi.id')
                                ->leftJoin('bull', 'produksi.id_bull', '=', 'bull.id')
                                ->leftJoin('bangsa', 'bull.id_bangsa', '=', 'bangsa.id')->get();
        $produksi = Produksi::with('distribusi')
                            ->select('produksi.*', 'bangsa.bangsa', 'bull.bull', 'bull.kode_bull', DB::raw('produksi.produksi - IFNULL(SUM(distribusi.jumlah), 0) as sisa'))
                            ->leftJoin('distribusi', 'produksi.id', '=', 'distribusi.id_produksi')
                            ->leftJoin('bull', 'produksi.id_bull', '=', 'bull.id')
                            ->leftJoin('bangsa', 'bull.id_bangsa', '=', 'bangsa.id')
                            ->groupBy('produksi.id')
                            ->havingRaw('sisa > 0')
                            ->get();

        return view('pages.cart', [
            'distribusi' => $distribusi,
            'produksi' => $produksi
        ]);
    }

    public function store(Request $request) 
    {
        $request->validate([
            'id_produksi' => 'required',
            'tanggal' => 'required',
            'jumlah' => 'required|numeric',
            'tujuan' => 'required',
            'container' => 'required'
        ]);

        $produksi = Produksi::find($request->id_produksi);

        if (!$produksi) {
            return back()->withErrors(['id_produksi' => 'Produksi tidak ditemukan']);
        }

        $totalDistribusi = Distribusi::where('id_produksi', $request->id_produksi)->sum('jumlah');

        $sisaProduksi = $produksi->produksi - $totalDistribusi;

        if ($request->jumlah > $sisaProduksi) {
            return back()->withErrors(['jumlah' => 'Jumlah yang diinput melebihi sisa produksi yang tersedia']);
        }

        // Buat data distribusi baru
        $distribusi = Distribusi::create([
            'id_produksi' => $request->id_produksi,
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah,
            'tujuan' => $request->tujuan,
            'container' => $request->container
        ]);

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
