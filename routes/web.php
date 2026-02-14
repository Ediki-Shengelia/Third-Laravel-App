<?php

use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    Route::post('/profile.photo', [ProfileController::class, 'uploadPhoto'])->name('uploadPhoto');
    Route::resource('market', \App\Http\Controllers\MarketController::class);
    Route::resource('market.review', \App\Http\Controllers\ReviewController::class)
        ->only(['create', 'store']);
    Route::post('add/{market}/like', [LikeController::class, 'add_like_logic'])->name('like');
});

Route::post('/read/{id}', function ($id) {
    auth()->user()->unreadNotifications->where('id', $id)->markAsRead();
    return back();
})->name('onlyOne');
Route::post('read.all', function () {
    auth()->user()
        ->unreadNotifications
        ->markAsRead();
    return back();
})->name('read.all');

require __DIR__ . '/auth.php';
