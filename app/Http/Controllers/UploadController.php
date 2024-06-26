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
        return view('upload.index');
    }


    public function filter(Request $request)
    {
        // Log the request input to check if "bangsa" is captured correctly
        Log::info('Filter request:', $request->all());
        
        // Initialize filtered data array
        $filteredData = [];
        $filter_bangsa = $request->input('bangsa');
        
        $filter_from_date =  $request->input('from_date');
        $filter_to_date = $request->input('to_date');
        $filter_per_page = ($request->input('perPage')) ? $request->input('perPage') : 10;
        

        DB::enableQueryLog();
        
        // If a filter is applied
        if ($filter_bangsa) {
            if ($filter_from_date && $filter_to_date) {
                $filteredData = Produksi::select('produksi.*', DB::raw('produksi.produksi - IFNULL(SUM(distribusi.jumlah), 0) as sisa'))
                                        ->leftJoin('distribusi', 'produksi.id', '=', 'distribusi.id_produksi')
                                        ->where('produksi.bangsa', $filter_bangsa)
                                        ->whereBetween('produksi.tanggal', [date('Y-m-d', strtotime($filter_from_date)), date('Y-m-d', strtotime($filter_to_date))])
                                        ->groupBy('produksi.id')
                                        ->paginate($filter_per_page);
            } else {
                $filteredData = Produksi::select('produksi.*', DB::raw('produksi.produksi - IFNULL(SUM(distribusi.jumlah), 0) as sisa'))
                                        ->leftJoin('distribusi', 'produksi.id', '=', 'distribusi.id_produksi')
                                        ->where('produksi.bangsa', $filter_bangsa)
                                        ->groupBy('produksi.id')
                                        ->latest()
                                        ->paginate($filter_per_page);
            }
        } else {
            if ($filter_from_date && $filter_to_date) {
                $filteredData = Produksi::select('produksi.*', DB::raw('produksi.produksi - IFNULL(SUM(distribusi.jumlah), 0) as sisa'))
                                        ->leftJoin('distribusi', 'produksi.id', '=', 'distribusi.id_produksi')
                                        ->whereBetween('produksi.tanggal', [date('Y-m-d', strtotime($filter_from_date)), date('Y-m-d', strtotime($filter_to_date))])
                                        ->groupBy('produksi.id')
                                        ->paginate($filter_per_page);
            } else {
                $filteredData = Produksi::select('produksi.*', DB::raw('produksi.produksi - IFNULL(SUM(distribusi.jumlah), 0) as sisa'))
                                        ->leftJoin('distribusi', 'produksi.id', '=', 'distribusi.id_produksi')
                                        ->groupBy('produksi.id')
                                        ->paginate($filter_per_page);
            }
        }

        $totalFiltered = $filteredData->total();
        $bangsa = Produksi::select('bangsa')->groupBy('bangsa')->get();
        // dd($filteredData);
        return view('upload.index', [
            "tittle" => "Tambah Data", 
            'bangsa' => $bangsa,
            'filteredData'=>$filteredData, 
            'filter_bangsa' => $filter_bangsa,
            'allData' => $filteredData,
            'from_date' => $filter_from_date,
            'to_date' => $filter_to_date,
            'per_page' => $filter_per_page,
            'totalFiltered' => $totalFiltered
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
        
        return back()->with('success','File Imported Successfully');
    }    

    
    public function store(Request $request) {
        // $produksiId = $request->id;
        $request->validate([
            'tanggal' => 'required',
            'nama_bull' => 'required',
            'kode_bull' => 'required',
            'bangsa' => 'required',
            'kode_batch' => 'required',
            'produksi' => 'required',
            'ptm' => 'required',
            'konsentrasi' => 'required'
        ]);
        $produksi = Produksi::create(
            [
                'tanggal' => $request->tanggal,
                'nama_bull' => $request->nama_bull,
                'kode_bull' => $request->kode_bull,
                'bangsa' => $request->bangsa,
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