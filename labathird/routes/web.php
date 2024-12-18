<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GrandmasterController;

Route::resource('grandmasters', GrandmasterController::class);
Route::get('grandmasters', [GrandmasterController::class, 'index'])->name('grandmasters.index');
Route::post('grandmasters', [GrandmasterController::class, 'store'])->name('grandmasters.store');
Route::get('grandmasters/{id}/edit', [GrandmasterController::class, 'edit'])->name('grandmasters.edit');
Route::put('grandmasters/{id}', [GrandmasterController::class, 'update'])->name('grandmasters.update');


Route::get('/', [GrandmasterController::class, 'index'])->name('grandmasters.index');
