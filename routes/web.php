<?php

use App\Imports\ProduksiImport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BmnController;
use App\Http\Controllers\PpmgtController;
use App\Http\Controllers\TargetController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DistribusiController;
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

// Route to return index page
Route::get('upload', [UploadController::class, 'index'])->name('upload');

// Route to do filter form
Route::get('upload', [UploadController::class, 'filter'])->name('filter');

// Route to do importexcel
Route::post('upload', [UploadController::class, 'importexcel']);

// Route to get data and handle the AJAX
Route::get('/getdata/{id}', [UploadController::class, 'getData']);
Route::post('/getdata/{id}', [UploadController::class, 'getData']);

// Route to store new produksi data manually
Route::post('upload/store', [UploadController::class, 'store'])->name('upload.store');
Route::post('/upload/{id}', [UploadController::class, 'edit'])->name('upload.edit');
Route::delete('/upload/{id}', [UploadController::class, 'destroy'])->name('upload.destroy');

// Route LoGin - Register - Update - Delete
Route::get('auth/login', [UserController::class, 'login'])->name('login');
Route::get('auth/register', [UserController::class, 'register'])->name('register');
Route::get('logout', [UserController::class, 'logout'])->name('logout');
Route::post('prosesLogin', [UserController::class, 'prosesLogin'])->name('prosesLogin');
Route::post('prosesRegister', [UserController::class, 'prosesRegister'])->name('prosesRegister');
Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
Route::get('profile', [UserController::class, 'profile'])->name('profile');
Route::post('updateProfile/{id}', [UserController::class, 'updateProfile'])->name('updateProfile');
Route::post('delete/{user}', [UserController::class, 'deleteAccount'])->name('delete');


// Route to view dashboard (NEW - 14/03/2024)
Route::get('pages/dashboard', [DashboardController::class, 'index']);
Route::get('dashboard', [DashboardController::class, 'getProduksi']);

// Route to view PPMGT Menu
Route::get('ppmgt', [PpmgtController::class, 'index']);

// Route to view BMN Page
Route::get('bmn', [BmnController::class, 'index']);

// Route to view Second Profile Page (Profile 2)
Route::get('profile2', [DashboardController::class, 'profile2']);

// Route to view target page
Route::get('pages/target', [TargetController::class, 'index']);
Route::get('target', [TargetController::class, 'getTargets'])->name('target.dashboard');

// Route to save the target data
Route::post('pages/target/store', [TargetController::class, 'store'])->name('target.store');
Route::post('target/{id}', [TargetController::class, 'edit'])->name('target.edit');
Route::delete('target/{id}', [TargetController::class, 'destroy'])->name('target.destroy');

// Route to view Distribusi Page
Route::get('cart', [DistribusiController::class, 'index']);

// Route to create new distribusi data
Route::post('cart/store', [DistribusiController::class, 'store'])->name('cart.store');
Route::post('pages/cart/{id}', [DistribusiController::class, 'edit'])->name('cart.edit');
Route::delete('pages/cart/{id}', [DistribusiController::class, 'destroy'])->name('cart.destroy');

// Route to get produksi data

// Auth Login User
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

