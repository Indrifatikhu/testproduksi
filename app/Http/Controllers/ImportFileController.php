<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ProduksiImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportFileController extends Controller
{
    public function import() {
        return view('import.import', ["tittle"=>"Import File"]);
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
    
}
