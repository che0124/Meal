<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', function () {
    return view('home');
});


Route::resource('posts', App\Http\Controllers\PostController::class); 

Route::get('/surprise', [App\Http\Controllers\SurpriseController::class, 'surprise'])->name('surprise');
Route::get('/user/{name}', [App\Http\Controllers\UserController::class, 'show'])->name('{name}');
Route::get('/event', [App\Http\Controllers\UserController::class, 'show'])->name('{name}');



Route::get('/test', function(){
    return session()->all();
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
