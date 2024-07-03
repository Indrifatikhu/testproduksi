<?php

namespace App\Http\Controllers;

use App\Models\Bull;
use App\Models\Bangsa;
use Illuminate\Http\Request;

class BullController extends Controller
{
    public function index()
    {
        $bull = Bull::join('bangsa', 'bull.id_bangsa', '=', 'bangsa.id')
                     ->select('bull.*', 'bangsa.bangsa as nama_bangsa')
                     ->get();
        $bangsa = Bangsa::all();

        return view('pages.bull', [
            'bull' => $bull,
            'bangsa' => $bangsa
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_bangsa' => 'required|integer',
            'kode_bull' => 'required|string|max:255',
            'bull' => 'required|string|max:255',
        ]);

        Bull::create($request->all());
        return back()->with('success', 'Data Bull Berhasil Ditambahkan');
    }

    public function edit(Request $request, string $id)
    {
        Bull::find($id)->update($request->all());
        $successMessage = 'Data id ' . $id . ' Berhasil di Update.';
        return back()->with('success', $successMessage);  
    }

    public function destroy($id)
    {
        Bull::find($id)->delete();
        $successMessage = 'Data id' . $id . ' Berhasil di Hapus.';
        return back()->with('success', $successMessage);  
    }

    function getBulls($idbangsa)
    {
        $bulls = Bull::where('id_bangsa', $idbangsa)->get();
        return response()->json($bulls);
    }
}