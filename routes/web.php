<?php

use App\Http\Controllers\BukuTamuController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BukuTamuController::class, 'index'])->name('bukutamu.index');
Route::post('/bukutamu', [BukuTamuController::class, 'store'])->name('bukutamu.store');