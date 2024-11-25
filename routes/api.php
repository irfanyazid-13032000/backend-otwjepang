<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KanjiController;
use App\Http\Controllers\TambahtambahanController;


Route::get('/soal', [KanjiController::class, 'soal']);

Route::post('/insertemailtambahtambahan', [TambahtambahanController::class, 'store']);
