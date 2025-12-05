<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InteriorController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ServiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AdminMiddleware;

use function Symfony\Component\String\s;

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
    Route::get('/interior/{slug}',[HomeController::class,'interior'])->name('interior.show');
    Route::get('/service/{slug}',[HomeController::class,'serviceItem'])->name('service.show');
    Route::get('/service/',[HomeController::class,'service'])->name('service');
});

Route::name('admin.')->prefix('admin')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'processLogin'])->name('login.process');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::middleware([AdminMiddleware::class])->group(function () {
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

    //Product Routes
    Route::get('/product', [ProductController::class,'index'])->name('product.index');
    Route::get('/product/create', [ProductController::class,'create'])->name('product.create');
    Route::post('/product/store', [ProductController::class,'store'])->name('product.store');
    Route::get('/product/edit/{id}', [ProductController::class,'edit'])->name('product.edit');
    Route::post('/product/update', [ProductController::class,'update'])->name('product.update');
    Route::delete('/product/destroy', [ProductController::class,'destroy'])->name('product.destroy');

    //Role Routes
    Route::get('/role', [RoleController::class, 'index'])->name('role.index');
    Route::get('/role/create', [RoleController::class, 'create'])->name('role.create');
    Route::post('/role/store', [RoleController::class, 'store'])->name('role.store');
    Route::get('/role/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
    Route::post('/role/update', [RoleController::class, 'update'])->name('role.update');
    Route::delete('/role/destroy', [RoleController::class, 'destroy'])->name('role.destroy');

    //Account Routes
    Route::get('/account', [AccountController::class, 'index'])->name('account.index');
    Route::get('/account/create', [AccountController::class, 'create'])->name('account.create');
    Route::post('/account/store', [AccountController::class,'store'])->name('account.store');  
    Route::get('/account/edit/{id}', [AccountController::class, 'edit'])->name('account.edit');
    Route::post('/account/update', [AccountController::class, 'update'])->name('account.update');
    Route::delete('/account/destroy', [AccountController::class, 'destroy'])->name('account.destroy');

    });
});

