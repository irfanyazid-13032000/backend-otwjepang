<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KanjiController;


Route::get('kanji/add', function () {
    return view('kanji.kanji-add');
});

Route::post('kanji/store',[KanjiController::class,'store']);


