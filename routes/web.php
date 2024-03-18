<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RotasController;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\EpisodeoController;

Route::get('/', [RotasController::class, 'index']);


Route::get('/dashboard', [RotasController::class, 'favorito'])->middleware('auth');

Route::get('/admin', [RotasController::class, 'admin'])->middleware('auth');

Route::post('/store/anime', [AnimeController::class, 'store'])->middleware('auth');

Route::get('/genero/anime', [RotasController::class, 'genero']);

Route::post('/anime/favoritar/{id}', [AnimeController::class, 'favoritar'])->middleware('auth');

Route::delete('/anime/desfavoritar/{id}', [AnimeController::class, 'leaveAnime'])->middleware('auth');

Route::get('/episodeos/{id}', [EpisodeoController::class, 'episodeos_anime']);

Route::get('/crud_episodeo/{id}', [EpisodeoController::class, 'form_ep'])->middleware('auth');

Route::post('/add/episodeo', [EpisodeoController::class, 'adicionar_episodeo'])->middleware('auth');

