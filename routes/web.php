<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KanjiController;
use App\Http\Controllers\LoginController;

Route::middleware('guest')->group(function () {
  Route::get('login', [LoginController::class, 'index'])->name('login');
  Route::post('login', [LoginController::class, 'auth'])->name('login.auth');
});


// Protect kanji routes for authenticated users only
Route::middleware('auth')->group(function () {
  Route::get('kanji', [KanjiController::class, 'index'])->name('kanji.index');
  Route::get('kanji/add', [KanjiController::class, 'create'])->name('kanji.add');
  Route::get('kanji/edit/{id}', [KanjiController::class, 'edit'])->name('kanji.edit');
  Route::post('kanji/update/{id}', [KanjiController::class, 'update'])->name('kanji.update');
  Route::post('kanji/store', [KanjiController::class, 'store'])->name('kanji.store');
  Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});



