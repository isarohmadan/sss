<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UI\UiController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;


Route::get('/About', [UiController::class, 'about'])->name('home');
Route::get('/', [UiController::class, 'gallery_category'])->name('gallery_category');
Route::get('/Gallery/{type}', [UiController::class, 'gallery_picture'])->name('gallery_picture');
Route::get('/Vinyls', [UiController::class, 'vinyl_gallery'])->name('vinyl_gallery');
Route::get('/Merch', [UiController::class, 'gallery_merch'])->name('gallery_merches');
Route::get('/Merch/{merch_type}', [UiController::class, 'gallery_merch_type'])->name('gallery_merchant_type');
Route::get('/Merch/{merch_type}/{slug_merch}', [UiController::class, 'product_specific'])->name('product_specific');
Route::post('/Cart/Add', [CartController::class, 'addToCartMerch'])->name('addToCartMerch');
Route::get('/Cart', [CartController::class, 'cart'])->name('cart_page');
Route::get('/Checkout', [CheckoutController::class, 'checkoutPage'])->name('checkout_page');
Route::get('/Cart/Session', [CartController::class, 'get_cart'])->name('getSessionCart');
Route::get('/Cart/SessionProduct', [CartController::class, 'getCartWithProduct'])->name('getSessionProduct');
Route::post('/Cart/Delete', [CartController::class, 'deleteFromCartMerch'])->name('deleteMerchCart');
