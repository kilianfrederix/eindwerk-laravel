<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [StoreController::class, 'index'])->name('products.index');
Route::get('/product/{product}', [StoreController::class, 'show'])->name('products.show');

Route::get('/brands/{brand}', [BrandsController::class, 'show'])->name('brands.show');

Route::get('/cart', [ShoppingCartController::class, 'index'])->name('cart')->middleware('auth');
Route::post('/cart/{product}', [ShoppingCartController::class, 'add'])->name('cart.add')->middleware('auth');
Route::put('/cart/{product}', [ShoppingCartController::class, 'update'])->name('cart.update')->middleware('auth');
Route::delete('/cart/{product}', [ShoppingCartController::class, 'delete'])->name('cart.delete')->middleware('auth');
Route::get('/checkout', [OrdersController::class, 'checkout'])->name('checkout')->middleware('auth');

Route::get('/discount/remove', [ShoppingCartController::class, 'removeDiscountCode'])->name('discount.remove')->middleware('auth');
Route::post('/discount/set', [ShoppingCartController::class, 'setDiscountCode'])->name('discount.set')->middleware('auth');

Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index')->middleware('auth');
Route::post('/orders', [OrdersController::class, 'store'])->name('orders.store')->middleware('auth');
Route::get('/orders/{order}', [OrdersController::class, 'show'])->name('orders.show')->middleware('auth');

Route::get('/favorites', [FavoritesController::class, 'favorites'])->name('favorites')->middleware('auth');
Route::get('/favorites/{product}', [FavoritesController::class, 'toggleFavorite'])->name('favorites.toggle')->middleware('auth');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile')->middleware('auth');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::put('/profile/edit/email', [ProfileController::class, 'updateEmail'])->name('profile.update-email')->middleware('auth');
Route::put('/profile/edit/password', [ProfileController::class, 'updatePassword'])->name('profile.update-password')->middleware('auth');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'handleLogin'])->name('login.post')->middleware('guest');
Route::get('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'handleRegister'])->name('register.post')->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
