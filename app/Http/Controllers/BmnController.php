<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BmnController extends Controller
{
    public function index()
    {
        return view('pages.bmn', ["tittle"=>"Stock Barang"]);
    }
}
