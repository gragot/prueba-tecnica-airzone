<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('categoria/{categoria_id}', [CategoryController::class, 'show']);
Route::post('categoria/store', [CategoryController::class, 'store']);
Route::put('categoria/{categoria_id}/update', [CategoryController::class, 'update']);
Route::delete('categoria/{categoria_id}/destroy', [CategoryController::class, 'destroy']);
