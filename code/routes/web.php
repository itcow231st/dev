<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InteriorController;
use App\Http\Controllers\Admin\ServiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::name('home.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/contact',[HomeController::class, 'contact'])->name('contact');
    Route::get('/checkout',[HomeController::class, 'checkout'])->name('checkout');
    Route::get('/products', [HomeController::class, 'products'])->name('products');
    Route::get('/product/{slug}', [HomeController::class, 'productDetail'])->name('product.detail');
    Route::get('/cart',[HomeController::class, 'cart'])->name('cart');
    Route::get('/login',[HomeController::class, 'login'])->name('login');
    Route::get('/register',[HomeController::class, 'register'])->name('register');
    Route::get('/profile',[HomeController::class, 'profile'])->name('profile');
});

Route::name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    // Interior Routes
    Route::get('/interior', [InteriorController::class, 'index'])->name('interior.index');
    Route::get('/interior/create', [InteriorController::class, 'create'])->name('interior.create');
    Route::post('/interior/store', [InteriorController::class, 'store'])->name('interior.store');
    Route::get('/interior/edit/{id}', [InteriorController::class, 'edit'])->name('interior.edit');
    Route::post('/interior/update', [InteriorController::class, 'update'])->name('interior.update');
    Route::delete('/interior/destroy', [InteriorController::class, 'destroy'])->name('interior.destroy');
    
    // SERVICE Routes
    Route::get('/service', [ServiceController::class, 'index'])->name('service.index');
    Route::get('/service/create', [ServiceController::class, 'create'])->name('service.create');
    Route::post('/service/store', [ServiceController::class, 'store'])->name('service.store');
    Route::get('/service/edit/{id}', [ServiceController::class, 'edit'])->name('service.edit');
    Route::post('/service/update', [ServiceController::class, 'update'])->name('service.update');
    Route::delete('/service/destroy', [ServiceController::class, 'destroy'])->name('service.destroy');
});

