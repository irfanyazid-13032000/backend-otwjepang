<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KanjiController;


Route::get('/soal', [KanjiController::class, 'soal']);
