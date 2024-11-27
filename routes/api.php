<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KanjiController;
use App\Http\Controllers\TambahtambahanController;


Route::get('/soal', [KanjiController::class, 'soal']);

Route::get('/perubahan', function(){
  return 'tes perubahan lagi';
});

Route::post('/insertemailtambahtambahan', [TambahtambahanController::class, 'store']);
