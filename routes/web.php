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

Route::get('/cart', [ShoppingCartController::class, 'index'])->name('cart');
Route::post('/cart/{product}', [ShoppingCartController::class, 'add'])->name('cart.add');
Route::put('/cart/{product}', [ShoppingCartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{product}', [ShoppingCartController::class, 'delete'])->name('cart.delete');
Route::get('/checkout', [OrdersController::class, 'checkout'])->name('checkout');

Route::get('/discount/remove', [ShoppingCartController::class, 'removeDiscountCode'])->name('discount.remove');
Route::post('/discount/set', [ShoppingCartController::class, 'setDiscountCode'])->name('discount.set');

Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');
Route::post('/orders', [OrdersController::class, 'store'])->name('orders.store');
Route::get('/orders/{order}', [OrdersController::class, 'show'])->name('orders.show');

Route::get('/favorites', [FavoritesController::class, 'favorites'])->name('favorites');
Route::get('/favorites/{product}', [FavoritesController::class, 'toggleFavorite'])->name('favorites.toggle');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/edit/email', [ProfileController::class, 'updateEmail'])->name('profile.update-email');
Route::put('/profile/edit/password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'handleLogin'])->name('login.post');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'handleRegister'])->name('register.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


