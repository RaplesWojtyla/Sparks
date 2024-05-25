<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
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

Route::post('/upload-file', [
    FileController::class, 'uploadFile'
])->middleware(['auth', 'verified']);

Route::post('registrasi/upload-image', [
    RegisteredUserController::class, 'uploadImage'
])->middleware('guest');


Route::get('/dashboard', [
    HomeController::class, 'index'
])->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/create-post', [
    PostController::class, 'create'
])->middleware(['auth', 'verified'])->name('create.post');

Route::post('/post/{idPost}/like', [
    HomeController::class, 'countLikes'
])->middleware(['auth', 'verified'])->name('post.like');

Route::post('/follow/{user}', [
    FollowController::class, 'follow'
])->middleware(['auth', 'verified'])->name('follow');

Route::post('/unfollow/{user}', [
    FollowController::class, 'unfollow'
])->middleware(['auth', 'verified'])->name('unfollow');

Route::get('/api/search', [
    SearchController::class, 'search'
])->middleware(['auth', 'verified'])->name('api.searchbar');

Route::get('/api/history', [
    SearchController::class, 'history'
])->middleware(['auth', 'verified'])->name('api.history');

Route::post('/save-post/{idPost}', [
    BookmarkController::class, 'create'
])->middleware(['auth', 'verified'])->name('bookmark');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [SettingController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [SettingController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [SettingController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/profile/{idUser}', [
    ProfileController::class, 'index'
])->middleware(['auth', 'verified'])->name('profile.show');



require __DIR__.'/auth.php';
