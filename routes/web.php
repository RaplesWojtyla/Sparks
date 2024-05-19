<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/upload-image', [
    RegisteredUserController::class, 'uploadImage'
])->middleware('guest');

Route::get('/dashboard', [
    HomeController::class, 'index'
])->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/post/{idPost}/like', [
    HomeController::class, 'countLikes'
])->middleware(['auth', 'verified'])->name('post.like');

Route::post('/follow/{user}', [
    FollowController::class, 'follow'
])->middleware(['auth', 'verified'])->name('follow');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
