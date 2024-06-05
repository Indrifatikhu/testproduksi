<?php

namespace App\Http\Controllers;

use App\Models\Produksi;
use Illuminate\Http\Request;
use App\Models\TargetProduksi;

class DashboardController extends Controller
{
    public function index()
    {
        $allData = Produksi::all();
        return view('pages.dashboard', compact('allData'));
    }
    
    public function getProduksi()
    {
        $produksi = Produksi::all();
        return response()->json($produksi);
    }

    public function getTargets() 
    {
        $targets = TargetProduksi::all();
        return response()->json($targets);
    }


}

// ["tittle"=>"Dashboard"]
