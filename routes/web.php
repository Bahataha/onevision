<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Http;
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

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'authenticate'])->name('auth.login');
Route::get('register', [LoginController::class, 'register'])->name('auth.register');
Route::post('register', [LoginController::class, 'registration'])->name('auth.registration');

Route::get('posts', [PostController::class, 'index'])->middleware('auth');
Route::get('posts/{id}', [PostController::class, 'edit'])->name('post.edit')->middleware('auth');
Route::post('posts/{id}', [PostController::class, 'update'])->name('post.update')->middleware('auth');
Route::get('posts/{id}/show', [PostController::class, 'show'])->name('post.show')->middleware('auth');
