<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::put('/books/search', [App\Http\Controllers\HomeController::class, 'search'])->name('book.search');
    Route::get('/books/{book}', [App\Http\Controllers\HomeController::class, 'show'])->name('book.show');
    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile.index');
    Route::get('/profile/edit', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile.edit');
    Route::post('/profile/update', [App\Http\Controllers\HomeController::class, 'profile_update'])->name('profile.update');
    Route::get('/read/{book}', [App\Http\Controllers\HomeController::class, 'read'])->name('read');
    Route::get('/availability/{book}', [App\Http\Controllers\HomeController::class, 'availability'])->name('availability');

    Route::post('/reciver/{bookOrder}', [App\Http\Controllers\HomeController::class, 'reciver'])->name('reciver');
});
