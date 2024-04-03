<?php

use App\Imports\ProduksiImport;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\DatabaseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/database', function()
{
    return view('database.data', ["tittle" => "Database"]);
});

// Route to return index page
Route::get('upload', [UploadController::class, 'index'])->name('upload');

// Route to do filter form
Route::get('upload', [UploadController::class, 'filter'])->name('filter');

// Route to do importexcel
Route::post('upload', [UploadController::class, 'importexcel']);

// Route to get data and handle the AJAX
Route::get('/getdata/{id}', [UploadController::class, 'getData']);
Route::post('/getdata/{id}', [UploadController::class, 'getData']);

// Route to view database page (second navabar)
Route::get('/database', [DatabaseController::class, 'index'])->name('database');
Route::get('/database', [DatabaseController::class, 'filterNew']);

// Route to store new produksi data manually
Route::post('upload/store', [UploadController::class, 'store'])->name('upload.store');

// Route::get('/upload/{id}', [UploadController::class, 'edit'])->name('upload.edit');
Route::post('/upload/{id}', [UploadController::class, 'edit'])->name('upload.edit');
Route::delete('/upload/{id}', [UploadController::class, 'destroy'])->name('upload.destroy');