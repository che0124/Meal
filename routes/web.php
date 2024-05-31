<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SurpriseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostUserController;
use App\Http\Controllers\AvatarController;
use App\Http\Middleware\RedirectIfAuthenticated;
use Symfony\Component\HttpKernel\Profiler\Profile;

Auth::routes();

Route::get('/meal', function () {
    return view('heroSection');
})->middleware(RedirectIfAuthenticated::class);

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index']);

    Route::get('/surprise', [SurpriseController::class, 'surprise'])->name('surprise');
    Route::get('/turntable', function () {
        return view('turntable');
    })->name('turntable');

    Route::put('/profiles/avatar', [ProfileController::class, 'avatar'])->name('profiles.avatar');
    Route::get('/profiles/postUsers/{post}', [ProfileController::class, 'postUsers'])->name('profiles.postUsers');

    Route::resource('profiles', ProfileController::class);
    Route::resource('posts', PostController::class);
    Route::resource('post_user', PostUserController::class);
});
