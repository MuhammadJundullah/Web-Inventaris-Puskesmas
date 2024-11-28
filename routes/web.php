<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CRUDController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\Auth\AuthenticationController;


Route::middleware("guest")->group(function () {
    
    // route untuk menampilkan halaman /login
    Route::get('/inventaris/login', [AuthenticationController::class, 'showLoginForm'])->name('login');
    
    // rute untuk autentikasi
    Route::post('/inventaris/login', [AuthenticationController::class, 'login']);
    
});

//  rute yang dilindungin oleh auth
Route::middleware("auth")->group(function () {
    
    // method get
    Route::get('/inventaris', [PostsController::class, 'posts']);

    // route dashboard 
    Route::get('/inventaris/dashboard', [PostsController::class, 'posts']);
    
    // route about 
    Route::get('/inventaris/about', [AboutController::class, 'index']);
    
    // route halaman Posts per tahun 
    Route::get('/inventaris/inventory/{year?}', [PostsController::class, 'postsByYear']);
    
    // route halaman tambah data 
    Route::get('/inventaris/audit/tambah', [CRUDController::class, 'index']);
   
    // route halaman detail Posts
    Route::get('/inventaris/inventory/{tahun?}/{id?}', [PostsController::class, 'show']);
    
    // route halaman tambah data 
    Route::get('/inventaris/audit/edit/{tahun?}/{id?}', [CRUDController::class, 'showUpdatePage']);
  
    // route hapus data 
    Route::get('/inventaris/audit/hapus/{tahun?}/{id?}', [PostsController::class, 'destroy']);
  
    // route halaman daftar 
    Route::get('/inventaris/signup', [AccountsController::class, 'showRegistrationForm']);
    
    // route halaman Accounts yang terdaftar
    Route::get('/inventaris/registered-account', [AccountsController::class, 'index']);
    
    // route hapus Accounts yang terdaftar
    Route::get('/inventaris/hapus/{id?}', [AccountsController::class, 'destroy']);

    // POST
         
    // route insert data pendaftaran
    Route::post('/inventaris/signup', [AccountsController::class, 'register']);

    // route halaman tambah data 
    Route::post('/inventaris/audit/edit/{tahun?}/{id?}', [CRUDController::class, 'Update']);
    
    // route insert data 
    Route::post('/inventaris/audit/tambah', [CRUDController::class, 'insert']);
        
    // route logout
    Route::post('/inventaris/logout', [AuthenticationController::class, 'logout']);

});

