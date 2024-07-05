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
use App\Http\Controllers\TargetBangsaController;
use App\Http\Controllers\BangsaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BullController;

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

Route::get('login', [UserController::class, 'login'])->name('login');
Route::get('register', [UserController::class, 'register'])->name('register');
Route::get('logout', [UserController::class, 'logout'])->name('logout');
Route::post('login', [UserController::class, 'prosesLogin'])->name('prosesLogin');
Route::post('register', [UserController::class, 'prosesRegister'])->name('prosesRegister');

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'getProduksi']);
    Route::get('pages/dashboard', [DashboardController::class, 'index']);
    Route::get('pages/target', [TargetController::class, 'index']);
    Route::get('upload', [UploadController::class, 'index'])->name('upload');
    Route::get('upload', [UploadController::class, 'filter'])->name('filter');
    Route::get('getdata/{id}', [UploadController::class, 'getData']);
    Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('profile', [UserController::class, 'profile'])->name('profile');
    Route::get('ppmgt', [PpmgtController::class, 'index']);
    Route::get('bmn', [BmnController::class, 'index']);
    Route::get('profile2', [DashboardController::class, 'profile2']);
    Route::get('cart', [DistribusiController::class, 'index']);
    Route::get('home', [HomeController::class, 'index'])->name('home');

    Route::get('target', [TargetController::class, 'getTargets'])->name('target.dashboard');
    Route::get('targetbangsa', [TargetBangsaController::class, 'index'])->name('targetbangsa.index');
    Route::get('reportbangsa/{id}', [TargetBangsaController::class, 'reportDetail'])->name('targetbangsa.reportDetail');
    Route::get('bangsa', [BangsaController::class, 'index'])->name('bangsa.index');
    Route::get('bull', [BullController::class, 'index'])->name('bull.index');
    Route::get('bullsByBangsa/{id}', [BullController::class, 'getBulls'])->name('bangsabull');
    Route::get('getRegencyByProvinceId/{id}', [DistribusiController::class, 'getRegencyByProvinceId'])->name('getRegencyByProvinceId');
    
    Route::post('upload', [UploadController::class, 'importexcel']);
    Route::post('updateProfile/{id}', [UserController::class, 'updateProfile'])->name('updateProfile');
    Route::post('delete/{user}', [UserController::class, 'deleteAccount'])->name('delete');
    Route::post('pages/target/store', [TargetController::class, 'store'])->name('target.store');
    Route::post('target/{id}', [TargetController::class, 'edit'])->name('target.edit');
    Route::post('cart/store', [DistribusiController::class, 'store'])->name('cart.store');
    Route::post('pages/cart/{id}', [DistribusiController::class, 'edit'])->name('cart.edit');
    Route::post('getdata/{id}', [UploadController::class, 'getData']);
    Route::post('upload/store', [UploadController::class, 'store'])->name('upload.store');
    Route::post('upload/{id}', [UploadController::class, 'edit'])->name('upload.edit');
    Route::post('profile/{id}', [UserController::class, 'updateProfile'])->name('profile.edit');
    Route::post('targetbangsa', [TargetBangsaController::class, 'store'])->name('targetbangsa.store');
    Route::post('targetbangsa/{id}', [TargetBangsaController::class, 'edit'])->name('targetbangsa.edit');
    Route::post('bangsa', [BangsaController::class, 'store'])->name('bangsa.store');
    Route::post('bangsa/{id}', [BangsaController::class, 'edit'])->name('bangsa.edit');
    Route::post('bull', [BullController::class, 'store'])->name('bull.store');
    Route::post('bull/{id}', [BullController::class, 'edit'])->name('bull.edit');

    Route::delete('target/{id}', [TargetController::class, 'destroy'])->name('target.destroy');
    Route::delete('pages/cart/{id}', [DistribusiController::class, 'destroy'])->name('cart.destroy');
    Route::delete('upload/{id}', [UploadController::class, 'destroy'])->name('upload.destroy');
    Route::delete('targetbangsa/{id}', [TargetBangsaController::class, 'destroy'])->name('targetbangsa.destroy');
    Route::delete('bangsa/{id}', [BangsaController::class, 'destroy'])->name('bangsa.destroy');
    Route::delete('bull/{id}', [BullController::class, 'destroy'])->name('bull.destroy');
});


