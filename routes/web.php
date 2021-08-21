<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikesController;
use App\Http\Controllers\UserPostController;

Route::get('/posts', function () {
    return view('posts/index');
});

Route::get('/', function(){
    return view('home');
}) -> name('home');

Route::get('/register', [RegisterController::class,'index']) -> name('register');
Route::post('/register', [RegisterController::class,'store'])->name('store');

Route::post('/logout', [LogoutController::class,'store']) -> name('logout');

Route::get('/login', [LoginController::class,'index']) -> name('login');
Route::post('/login', [LoginController::class,'store']);

Route::get('/posts', [PostController::class,'index']) -> name('posts');
Route::post('/posts', [PostController::class,'store']);
Route::get('/posts/{post}', [PostController::class,'show'])->name('posts.show');
Route::delete('/posts/{post}/', [PostController::class,'destroy'])->name('posts.destroy');

Route::post('/posts/{post}/likes', [PostLikesController::class,'store']) -> name('posts.likes');
Route::delete('/posts/{post}/likes', [PostLikesController::class,'destroy']);

Route::get('/user/{user:username}/posts', [UserPostController::class,'index']) -> name('users.posts');

Route::get('/dashboard',[DashboardController::class,'index']) ->name('dashboard');
