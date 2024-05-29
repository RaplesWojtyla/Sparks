<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
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

// Landing Page & Upload Profile
Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::post('registrasi/upload-image', [RegisteredUserController::class, 'uploadImage']);
});

// Home
Route::get('/dashboard', [
    HomeController::class, 'index'
])->middleware(['auth', 'verified'])->name('dashboard');

// Upload File
Route::post('/upload-file', [
    FileController::class, 'uploadFile'
])->middleware(['auth', 'verified']);

// Post
Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('/create-post', [PostController::class, 'create'])->name('post.create');
    Route::post('/post/{idPost}/like', [LikeController::class, 'create'])->name('post.like');
    Route::post('/post/{idPost}/comment', [CommentController::class, 'create'])->name('post.comment');
    Route::post('/post/{idPost}/save', [BookmarkController::class, 'create'])->name('post.save');
    Route::delete('/post/{idPost}/delete', [BookmarkController::class, 'delete'])->name('post.delete');
});

// Follow
Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('/follow/{user}', [FollowController::class, 'follow'])->name('follow');
    Route::post('/unfollow/{user}', [FollowController::class, 'unfollow'])->name('unfollow');
});

// Search & Search History
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/api/search', [SearchController::class, 'search'])->name('api.searched');
    Route::get('/api/history', [SearchController::class, 'history'])->name('api.history');
});

// Update Profile
Route::middleware('auth')->group(function () {
    Route::get('/update-profile', [SettingController::class, 'edit'])->name('profile.edit');
    Route::patch('/update-profile', [SettingController::class, 'update'])->name('profile.update');
    Route::delete('/delete-account', [SettingController::class, 'destroy'])->name('profile.destroy');
});

// Show user profile
Route::get('/profile/{idUser}', [
    ProfileController::class, 'index'
])->middleware(['auth', 'verified'])->name('profile.show');

Route::get('info', function(){
    return view('info');
})->middleware(['auth', 'verified'])->name('info');

require __DIR__.'/auth.php';
