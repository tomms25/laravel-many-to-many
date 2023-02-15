<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/', [MainController::class, 'home'])
  ->name('home');

Route::get('/product', [MainController::class, 'product'])
  ->name('product');

Route::get('/create', [MainController::class, 'create'])
  ->name('create');
Route::post('/create', [MainController::class, 'store'])
  ->name('store');
