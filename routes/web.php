<?php

use App\Http\Controllers\AkunController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuditController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\InventoryControllerController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('/login', [LoginController::class, 'showloginform']);
});

Route::get('/login', [LoginController::class, 'showloginform']);

Route::post('login', [LoginController::class, 'login']);

//  rute yang dilindungin oleh auth
Route::middleware(['auth'])->group(function () {
    
    // route logout
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    
    // route login kalau blm login 
    
    // route dashboard 
    Route::get('/dashboard', [DashboardController::class, 'index']);
    
    // route about 
    Route::get('/about', function () {
        return view('about', ["title" => "About This Site"]);
    });
    
    // route halaman inventory per tahun 
    Route::get('/inventory/{year?}', [InventoryController::class, 'index']);
    
    // route halaman tambah data 
    Route::get('/audit/tambah-data', function () {
        return view('audit', ["title" => "Tambah Data Inventaris"], ['button' => ' + Tambah Data']);
    });
    
    // route insert data 
    Route::post('/audit/tambah-data', [AuditController::class, 'insert']);

    // route halaman daftar 
    Route::get('/signup', function() {
        return view('signup', ['title' => 'Tambah akun untuk masuk']); 
    });
    
    // route insert data pendaftaran
    Route::post('/signup', [AkunController::class, 'register']);
    
    // route halaman akun yang terdaftar
    Route::get('/registered-account', [AkunController::class, 'index']);
    
    // route hapus akun yang terdaftar
    Route::get('/hapus/{id?}', [AkunController::class, 'destroy']);
    
    // route halaman detail inventory
    Route::get('/inventory/{tahun?}/{id?}', [InventoryController::class, 'show']);
});

