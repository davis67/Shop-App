<?php


use App\Http\Controllers\ItemController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ItemController::class, 'index'])->name('home');
Route::middleware('can:admin')->group(function () {
Route::get('items/create', [ItemController::class, 'create']);
Route::post('items', [ItemController::class, 'store']);
Route::get('items/{item}/edit', [ItemController::class, 'edit']);
Route::patch('items/{item}', [ItemController::class, 'update']);
Route::delete('items/{item}', [ItemController::class, 'destroy']);
});
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');


