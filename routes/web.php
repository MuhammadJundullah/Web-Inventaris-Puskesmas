<?php

use App\Http\Controllers\AkunController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuditController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\InventoryControllerController;
use App\Models\Inventory;
use Illuminate\Support\Facades\Auth;

// route login kalau blm login 
Route::get('/', function () {
    return view('/login', [LoginController::class, 'showloginform']);
});

Route::get('/login', [LoginController::class, 'showloginform']);

Route::get('login', [LoginController::class, 'showloginform'])->name('login');

Route::post('login', [LoginController::class, 'login']);

//  rute yang dilindungin oleh auth
Route::middleware(['auth'])->group(function () {
    
    // route logout
    Route::post('/logout', [LoginController::class, 'logout']);
    
    // route dashboard 
    Route::get('/dashboard', [DashboardController::class, 'index']);
    
    // route about 
    Route::get('/about', [DashboardController::class, 'showAbout']);
    
    // route halaman inventory per tahun 
    Route::get('/inventory/{year?}', [InventoryController::class, 'index']);
    
    // route halaman tambah data 
    Route::get('/audit/tambah', [AuditController::class, 'index']);
  
    // route halaman tambah data 
    Route::get('/audit/edit/{tahun}/{id}', [InventoryController::class, 'showUpdatePage']);
    
    // route insert data 
    Route::post('/audit/tambah', [AuditController::class, 'insert']);
  
    // route insert data 
    Route::get('/audit/hapus/{tahun?}/{id?}', [InventoryController::class, 'destroy']);
  
    // route halaman daftar 
    Route::get('/signup', [AkunController::class, 'showRegistrationForm']);

    // route halaman edit 
    Route::get('/audit/edit/{tahun?}/{id?}', function() {
        return view('update', ['title' => 'Edit data inventaris']); 
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

