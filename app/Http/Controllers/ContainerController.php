<?php

namespace App\Http\Controllers;

use App\Models\Container;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContainerController extends Controller
{
    public function index()
    {
        $containers = Container::all();
        return view('pages.container', compact('containers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_container' => 'required|string|max:255',
            'type_container' => 'required|string|max:255',
            'code' => 'required|string|max:255',
        ]);

        Container::create($request->all());
        return redirect()->route('containers.index')->with('success', 'Container created successfully.');
    }

    public function edit(Request $request, string $id)
    {
        $request->validate([
            'nama_container' => 'required|string|max:255',
            'type_container' => 'required|string|max:255',
            'code' => 'required|string|max:255',
        ]);
        Container::find($id)->update($request->all());
        return redirect()->route('containers.index')->with('success', 'Container updated successfully.');
    }

    public function destroy($id)
    {
        Container::find($id)->delete();
        return redirect()->route('containers.index')->with('success', 'Container deleted successfully.');
    }

    function getDetailContainerById($id){
        $data = DB::table('distribusi')
                    ->select('distribusi.*', 'produksi.*', 'bull.*', 'bangsa.*', 'containers.*')
                    ->leftJoin('produksi', 'distribusi.id_produksi', '=', 'produksi.id')
                    ->leftJoin('bull', 'produksi.id_bull', '=', 'bull.id')
                    ->leftJoin('bangsa', 'bull.id_bangsa', '=', 'bangsa.id')
                    ->leftJoin('containers', 'produksi.container_id', '=', 'containers.id')
                    ->where('produksi.container_id', $id)
                    ->get();
        return response()->json($data);
    }
}
