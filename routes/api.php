<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CRUDController;
use App\Http\Controllers\Api\PostsController;

// Route::middleware("auth")->group(function () {
    
    Route::get('/posts', [PostsController::class, 'posts']);

    Route::get('/posts/{year}', [PostsController::class, 'postsByYear']);

    Route::get('/post/{year}/{id}', [PostsController::class, 'postById']);
    
    Route::post('/insert', [CRUDController::class, 'insert']);

// });
