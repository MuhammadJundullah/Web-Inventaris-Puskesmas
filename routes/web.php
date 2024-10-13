<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard', ["title" => "Data Inventaris Puskesmas"]);
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/about', function () {
    return view('about', ["title" => "About This Site"]);
});

Route::get('/inventory', function () {
    return view('inventory', ["title" => "Inventaris Januari 2024"]);
});

Route::get('/auditData', function () {
    return view('auditData', ["title" => "Audit Data Inventaris"]);
});
