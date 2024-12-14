<?php

use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::middleware('auth:sanctum')->group( function () {
    Route::resource('products', ProductController::class);
    Route::post('/logout', [RegisterController::class, 'logout'])->name('logout');
});
// Route::post('/logout', [RegisterController::class, 'logout'])->name('logout')->middleware('auth:sanctum');

// Route::resource('products', ProductController::class);
