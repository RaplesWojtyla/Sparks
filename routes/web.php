<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
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

Route::get('/api/search', [SearchController::class, 'search'])->name('api.search');
Route::get('/api/history', [SearchController::class, 'history'])->name('api.history');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
