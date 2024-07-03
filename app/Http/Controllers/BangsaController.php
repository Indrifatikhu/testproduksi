<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bangsa;

class BangsaController extends Controller
{
    public function index()
    {
        $bangsa = Bangsa::all();
        return view('pages.bangsa', [
            'bangsa' => $bangsa
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'bangsa' => 'required|string|max:255',
        ]);

        $bangsa = new Bangsa([
            'bangsa' => $request->get('bangsa'),
        ]);

        $bangsa->save();
        return redirect()->route('bangsa.index')->with('success', 'Bangsa created!');
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'bangsa' => 'required|string|max:255',
        ]);

        $bangsa = Bangsa::findOrFail($id);
        $bangsa->bangsa = $request->get('bangsa');
        $bangsa->save();

        return redirect()->route('bangsa.index')->with('success', 'Bangsa updated!');
    }

    public function destroy($id)
    {
        $bangsa = Bangsa::findOrFail($id);
        $bangsa->delete();

        return redirect()->route('bangsa.index')->with('success', 'Bangsa deleted!');
    }
}