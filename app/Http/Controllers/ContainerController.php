<?php

namespace App\Http\Controllers;

use App\Models\Container;
use Illuminate\Http\Request;

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
}
