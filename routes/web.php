<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CRUDController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\pengaturanController;
use App\Http\Controllers\Auth\AuthenticationController;

// route untuk menampilkan halaman /login
Route::get('login', [AuthenticationController::class, 'showloginform'])->name('login');

// rute untuk autentikasi
Route::post('login', [AuthenticationController::class, 'login']);

//  rute yang dilindungin oleh auth
Route::middleware("auth")->group(function () {
    
    // method get
    Route::get('/', [PostsController::class, 'posts']);

    // route dashboard 
    Route::get('/dashboard', [PostsController::class, 'posts']);
    
    // route about 
    Route::get('/about', [AboutController::class, 'index']);
    
    // route halaman Posts per tahun 
    Route::get('/inventory/{year?}', [PostsController::class, 'postsByYear']);
    
    // route halaman tambah data 
    Route::get('/audit/tambah', [CRUDController::class, 'index']);
   
    // route halaman detail Posts
    Route::get('/inventory/{tahun?}/{id?}', [PostsController::class, 'show']);
    
    // route halaman tambah data 
    Route::get('/audit/edit/{tahun?}/{id?}', [CRUDController::class, 'showUpdatePage']);
  
    // route hapus data 
    Route::get('/audit/hapus/{tahun?}/{id?}', [PostsController::class, 'destroy']);
  
    // route halaman daftar 
    Route::get('/signup', [AccountsController::class, 'showRegistrationForm']);
    
    // route halaman Accounts yang terdaftar
    Route::get('/registered-account', [AccountsController::class, 'index']);
    
    // route hapus Accounts yang terdaftar
    Route::get('/hapus/{id?}', [AccountsController::class, 'destroy']);

    // method post
         
    // route insert data pendaftaran
    Route::post('/signup', [AccountsController::class, 'register']);

    // route halaman tambah data 
    Route::post('/audit/edit/{tahun?}/{id?}', [CRUDController::class, 'Update']);
    
    // route insert data 
    Route::post('/audit/tambah', [CRUDController::class, 'insert']);
        
    // route logout
    Route::post('/logout', [AuthenticationController::class, 'logout']);

});

