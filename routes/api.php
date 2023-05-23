<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([], function () {
    Route::post('/login', \App\Http\Controllers\API\User\LoginController::class);
    Route::post('/register', \App\Http\Controllers\API\User\RegisterController::class);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/books', \App\Http\Controllers\API\Book\IndexController::class);
    Route::get('/books/my', \App\Http\Controllers\API\Book\MyBookController::class);
    Route::get('/books/{book}', \App\Http\Controllers\API\Book\ShowController::class);
    Route::post('/books/{book}/read', \App\Http\Controllers\API\Book\ReadController::class);
    Route::post('/books/{book}/availability', \App\Http\Controllers\API\Book\AvailabilityController::class);
    Route::post('/books', \App\Http\Controllers\API\Book\OrderBookController::class);
    Route::post('/me', \App\Http\Controllers\API\User\MeController::class);
});