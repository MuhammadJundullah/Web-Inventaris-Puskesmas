<?php

use App\Exports\DataExport;
use App\Http\Middleware\bendahara;
use App\Http\Middleware\inventaris;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CRUDController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\BendaharaController;
use App\Http\Controllers\Auth\AuthenticationController;

Route::get('/scan/inventaris/barang/{tahun?}/{id?}', [PostsController::class, 'showScanPage']);

// route untuk menampilkan halaman /login
Route::get('/inventaris/login', [AuthenticationController::class, 'showLoginForm'])->name('login');

// rute untuk autentikasi
Route::post('/inventaris/login', [AuthenticationController::class, 'login']);

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/masukan', function () {
    return view('masukan');
})->name('masukan');

Route::get('/bendahara/login', [BendaharaController::class, 'login'])->name('bendahara.login');

Route::post('/bendahara/loginbendahara', [BendaharaController::class, 'loginbendahara']);

Route::middleware([bendahara::class])->group(function () {
    
    // method get
    Route::get('/bendahara/dashboard', [BendaharaController::class, 'dashboard']);
    
    Route::get('/bendahara/signup', [BendaharaController::class, 'viewSignup']);
    
    Route::get('/bendahara/audit/hapus/{tahun?}/{id?}', [BendaharaController::class, 'hapus_data']);
    
    Route::get('/bendahara/audit/edit/{tahun?}/{id?}', [BendaharaController::class, 'viewEditData']);
    
    Route::get('/bendahara/registered-account', [BendaharaController::class, 'registered_accounts']);
    
    Route::get('/bendahara/audit/tambah', [BendaharaController::class, 'tambah']);
    
    Route::get('/bendahara/audit/duplikat/{year?}/{id?}', [BendaharaController::class, 'duplikat']);
    
    Route::get('/bendahara/about', [BendaharaController::class, 'about']);
        
    Route::get('/bendahara/arsip-by/{username?}/{year?}', [BendaharaController::class, 'postbyusername']);
    
    Route::get('/bendahara/{year?}', [BendaharaController::class, 'postbyyear']);

    Route::get('/bendahara/hapus/{id?}', [BendaharaController::class, 'destroy']);

    Route::get('/bendahara/export/{year}', [BendaharaController::class, 'export'])->name('bendahara.export');

    // method post
    Route::post('/bendahara/signup', [BendaharaController::class, 'signup']);
    
    Route::post('/bendahara/audit/edit', [BendaharaController::class, 'EditData']);

    Route::post('/bendahara/audit/tambah', [BendaharaController::class, 'insert']);
    
    Route::post('/bendahara/logout', [BendaharaController::class, 'logout']);

});

//  rute yang dilindungin oleh auth
Route::middleware([inventaris::class])->group(function () {

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
    Route::get('/inventaris/barang/{tahun?}/{id?}', [PostsController::class, 'show']);

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

    Route::get('/inventaris/export/{year}', [PostsController::class, 'export'])->name('inventaris.export');


    // POST

    // route insert data pendaftaran
    Route::post('/inventaris/signup', [AccountsController::class, 'register']);

    // route halaman tambah data 
    Route::post('/inventaris/audit/edit/{tahun?}/{id?}', [CRUDController::class, 'Update']);

    // route insert data 
    Route::post('/inventaris/audit/tambah', [CRUDController::class, 'insert']);

    // route logout
    Route::post('/inventaris/logout', [AuthenticationController::class, 'logout'])->name('inventaris.logout');

    // route cekta kode qr
    Route::get('/scan/cetak/{tahun?}/{id?}', [PostsController::class, 'generateQrCodePdf']);
});
