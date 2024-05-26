<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SurpriseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostUserController;
    
Auth::routes();

Route::get('/meal', function(){
    return view('heroSection');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    
    Route::get('/surprise', [SurpriseController::class, 'surprise'])->name('surprise');
    Route::get('/turntable', function(){
        return view('turntable');
    })->name('turntable');
    
    // Route::get('/user/{name}', [UserController::class, 'show'])->name('{name}');
    
    Route::resource('profiles', ProfileController::class); 
    Route::resource('posts', PostController::class); 
    Route::resource('post_user', PostUserController::class);
});


