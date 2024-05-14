<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UI\UiController;

Route::get('/', [UiController::class,'index'])->name('home');
Route::get('/Gallery', [UiController::class,'gallery_category'])->name(('gallery_category'));
Route::get('/Gallery/{type}', [UiController::class,'gallery_picture'])->name(('gallery_picture'));
Route::get('/Vinyls', [UiController::class,'vinyl_gallery'])->name(('vinyl_gallery'));
Route::get('/Merch_SSS', [UiController::class,'gallery_merch'])->name(('gallery_merch'));
