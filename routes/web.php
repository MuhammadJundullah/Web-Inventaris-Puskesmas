<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuditController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\InventoryControllerController;
use Illuminate\Support\Facades\Auth;


Route::get('login', [LoginController::class, 'showloginform'])->name('login');

Route::post('login', [LoginController::class, 'login']);

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('dashboard', ["title" => "Data Inventaris Puskesmas"]);
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard', ["title" => "Data Inventaris Puskesmas"]);
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/about', function () {
        return view('about', ["title" => "About This Site"]);
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/inventory', [InventoryController::class, 'index']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/audit', function () {
        return view('audit', ["title" => "Tambah Data Inventaris"]);
    });
});

Route::middleware(['auth'])->group(function () {
    Route::post('/audit', [AuditController::class, 'insert']);
});



