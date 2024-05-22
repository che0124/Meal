<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ModifyController;
use App\Http\Controllers\SurpriseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostUserController;

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('home');
    });
    
    Route::get('/surprise', [SurpriseController::class, 'surprise'])->name('surprise');
    Route::get('/user/{name}', [UserController::class, 'show'])->name('{name}');
    
    Route::resource('posts', PostController::class); 
    Route::resource('post_user', PostUserController::class);
});

Route::get('/modify/{user}', [ModifyController::class, 'modify'])->name('modify');


Route::get('/test', function(){
    return view('home');
});

