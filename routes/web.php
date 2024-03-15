<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RotasController;
use App\Http\Controllers\AnimeController;

Route::get('/', [RotasController::class, 'index']);


Route::get('/dashboard', [RotasController::class, 'favorito'])->middleware('auth');

Route::get('/admin', [RotasController::class, 'admin'])->middleware('auth');

Route::post('/store/anime', [AnimeController::class, 'store'])->middleware('auth');

Route::get('/genero/anime', [RotasController::class, 'genero']);

Route::post('/anime/favoritar/{id}', [AnimeController::class, 'favoritar']);
