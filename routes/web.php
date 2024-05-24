<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
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
    return view('auth.login');
});

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::get('/post', [PostController::class, 'index'])->name('post.index');
    // Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    // Route::post('/post/create', [PostController::class, 'store'])->name('post.store');
    // Route::get('/post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
    // Route::put('/post/{post}', [PostController::class, 'update'])->name('post.update');
    // Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');
    // Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('post.destroy');

    Route::resource('post', PostController::class);
});

require __DIR__.'/auth.php';