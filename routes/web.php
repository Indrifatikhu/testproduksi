<?php

use App\Imports\ProduksiImport;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\ImportFileController;
use App\Http\Controllers\TambahDataController;
use App\Http\Controllers\Auth\RegisterUserController;

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

// Route to view add page manually and store data daily
Route::get('add-data', [TambahDataController::class, 'index'])->name('add-data');

// Route to store new produksi data manually
Route::post('add-data/store', [TambahDataController::class, 'store', "tittle" => "Tambah Data"])->name('add-data.store');

// Route to view import file page and import excel file
Route::get('import', [ImportFileController::class, 'import'])->name('import');
Route::post('import', [ImportFileController::class, 'importexcel']);

// Route LoGin - Register - Update - Delete
Route::get('auth/login', [UserController::class, 'login'])->name('login');
Route::get('auth/register', [UserController::class, 'register'])->name('register');
Route::get('logout', [UserController::class, 'logout'])->name('logout');
Route::post('prosesLogin', [UserController::class, 'prosesLogin'])->name('prosesLogin');
Route::post('prosesRegister', [UserController::class, 'prosesRegister'])->name('prosesRegister');
Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
Route::get('profile', [UserController::class, 'profile'])->name('profile');
Route::post('updateProfile', [UserController::class, 'updateProfile'])->name('updateProfile');
Route::post('delete/{user}', [UserController::class, 'deleteAccount'])->name('delete');
