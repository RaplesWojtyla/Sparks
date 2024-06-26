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
use App\Http\Controllers\UsersController;
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
Route::get('/sparks', [
    HomeController::class, 'index'
])->middleware(['auth', 'verified'])->name('dashboard');

// Admin
Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/sparks/users', [UsersController::class, 'index'])->name('show.users');
    Route::get('/sparks/report/users', [UsersController::class, 'report'])->name('show.users.report');
    Route::patch('/banned/{idUser}/user', [UsersController::class, 'banned'])->name('user.banned');
    Route::patch('/unbanned/{idUser}/user', [UsersController::class, 'unbanned'])->name('user.unbanned');
});

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
    Route::delete('/post/{idPost}/delete', [PostController::class, 'delete'])->name('post.delete');
    Route::delete('/post/bookmark/{idBookmark}/delete', [BookmarkController::class, 'delete'])->name('post.unsave');
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

// Update Users
Route::middleware('auth')->group(function () {
    Route::get('/update/{user}/profile', [SettingController::class, 'edit'])->name('profile.edit');
    Route::patch('/update/{user}/profile', [SettingController::class, 'update'])->name('profile.update');
    Route::patch('/report/{idUser}/user', [SettingController::class, 'report'])->name('user.report');
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
