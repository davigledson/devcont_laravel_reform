<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChirpController;
use App\Http\Controllers\PostController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('chirps', ChirpController::class)
->only(['index', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

    Route::get('/posts/create', [PostController::class,'create'])->name('posts.create');
    Route::post('/posts/store', [PostController::class,'store'])->name('posts.store');
    Route::get('/posts', [PostController::class,'index'])->name('posts.index');

    Route::get('/posts/{post}/edit', [PostController::class,'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class,'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class,'destroy'])->name('posts.destroy');
require __DIR__.'/auth.php';
