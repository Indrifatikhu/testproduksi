<?php

namespace App\Http\Controllers;

use App\Models\Produksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DatabaseController extends Controller
{
    public function index() {
        $allData = Produksi::all();
        return view('database.data', ["tittle" => "Database", 'allData'=>$allData]);
    }
    
    public function filterNew(Request $request){
        $allData = Produksi::all();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        // Log the request input to check if "bangsa" is captured correctly
        Log::info('Filter request:', $request->all());

        $filters = Produksi::whereBetween('created_at', [$start_date, $end_date])->get();

        return view('database.data', [
            "tittle" => "Produksi", 
            'filters' => $filters,
            'allData'=>$allData
        ]);
    }

    // public function filterNew(Request $request){
    //     $allData = Produksi::all();

    //     $start_date = $request->input('start_date');
    //     $end_date = $request->input('end_date');

    //     $filterNew = Produksi::whereBetween('created_at', [$start_date, $end_date])->get();

    //     return view('database.data', 
    //     [
    //         "tittle" => "Produksi", 
    //         'filterNew' => $filterNew,
    //         'allData'=>$allData
    //     ]);

    // }
            
}
