<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\Produksi;
use Illuminate\Http\Request;
use App\Imports\ProduksiImport;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\Importable;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

class UploadController extends Controller
{
    public function index() 
    {
        return view('uplaoad.index', ["tittle"=>"Produksi"]);
    }

    public function filter(Request $request)
    {
        // Log the request input to check if "bangsa" is captured correctly
        Log::info('Filter request:', $request->all());
        
        // Initialize filtered data array
        $filteredData = [];
        $filter_bangsa = $request->input('bangsa');
        $filter_bull = $request->input('nama_bull');
        
        // Perform your initial query to retrieve all data
        $allData = Produksi::select(
            'id', 
            'created_at',
            'bangsa',
            'nama_bull',
            'kode_bull',
            'kode_batch',
            'produksi',
            'ptm',
            'konsentrasi'
        )->latest()->get();

        // If a filter is applied
        if ($filter_bangsa && $filter_bull) {
            // Get the filter value
            $filteredData = Produksi::where(['bangsa' => $filter_bangsa, 'nama_bull' => $filter_bull])->latest()->get();
        } else {
            // If no filter is applied, use all data
            $filteredData = $allData;
        }

        return view('upload.index', [
            "tittle" => "Produksi", 
            'filteredData'=>$filteredData, 
            'filter_bangsa' => $filter_bangsa,
            'filter_bull' => $filter_bull,
            'allData' => $allData
        ]);
    }

    public function importexcel(Request $request) 
    {
        $request->validate([
            'file' => [
                'required', 
                'file'
            ],
        ]);

        $file = $request->file('file');
        Excel::import(new ProduksiImport, $file);
        
        return back()->withStatus('Imported Successfully');
    }    

    
    public function store(Request $request) {
        // $produksiId = $request->id;
        $request->validate([
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

    public function edit(Request $request, string $id) {
    
        Produksi::find($id)->update($request->all());
        return back()->with('success', 'Data Berhasil di Update');  
    }

    public function destroy($id) {
        Produksi::find($id)->delete();
        return back()->with('success', 'Data Berhasil di Hapus');
    }
}

// $data = $request->validate([]);
        // $allData = Produksi::findorOrFail($id)->update($data);
        // return back()->with('success', 'Data Berhasil di Update');
        // return view('upload.index', [compact('allData'), "tittle" => "Produksi", "id" => $id]);


// $request->validate([
        //     'bangsa' => 'required',
        //     'nama_bull' => 'required',
        //     'kode_bull' => 'required',
        //     'kode_batch' => 'required',
        //     'produksi' => 'required',
        //     'ptm' => 'required',
        //     'konsentrasi' => 'required'
        // ]);