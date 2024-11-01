<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KanjiController;


Route::get('kanji',[KanjiController::class,'index'])->name('kanji.index');
Route::get('kanji/add',[KanjiController::class,'create'])->name('kanji.add');
Route::post('kanji/store',[KanjiController::class,'store'])->name('kanji.store');


