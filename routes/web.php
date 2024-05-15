<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', function () {
    return view('home');
});



Route::get('/surprise', [App\Http\Controllers\SurpriseController::class, 'surprise'])->name('surprise');
Route::get('/join', [App\Http\Controllers\JoinController::class, 'join'])->name('join');
Route::get('/user/{name}', [App\Http\Controllers\UserController::class, 'show'])->name('{name}');

Route::resource('posts', App\Http\Controllers\PostController::class); 


Route::get('/test', function(){
    return session()->all();
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
