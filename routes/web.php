<?php

use App\Http\Controllers\AkunController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuditController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\InventoryControllerController;
use Illuminate\Support\Facades\Auth;


Route::get('login', [LoginController::class, 'showloginform'])->name('login');

Route::post('login', [LoginController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('title');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/about', function () {
        return view('about', ["title" => "About This Site"]);
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/inventory/{year?}', [InventoryController::class, 'index']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/audit/tambah-data', function () {
        return view('audit', ["title" => "Tambah Data Inventaris"], ['button' => ' + Tambah Data']);
    });
});

Route::middleware(['auth'])->group(function () {
    Route::post('/audit/tambah-data', [AuditController::class, 'insert']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/signup', function () {
        return view('signup', ['title' => 'Tambah akun untuk masuk']);
    });
});

Route::middleware(['auth'])->group(function () {
    Route::post('/signup', function () {
        return view('signup');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::post('/signup', [AkunController::class, 'register']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/registered-account', [AkunController::class, 'index']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/hapus/{id?}', [AkunController::class, 'destroy']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/inventory/{tahun?}/{id?}', [InventoryController::class, 'show']);
});
