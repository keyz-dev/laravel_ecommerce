<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get("/",[ProductController::class, 'index'])->name('home.index');
Route::controller(ProductController::class)
->name('product.')
->prefix('products')
->group(function(){
    Route::get("/add", "create")->name("create");
    Route::post("/add", "store")->name("store");
    Route::get("/{product}/edit",  'edit')->name('edit');
    Route::get('/{product}/delete',  'destroy')->name('delete');
    Route::patch('/{product}',  'update')->name('update');
});

// User handlers
Route::prefix('user')
->name('user.')
->group(function(){
    Route::controller(UserController::class)->group(function(){
        Route::get("/register", 'create')->name("register");
        Route::post('/register',  'store')->name("store");
        Route::get("/login",  'index')->name("login");
    });
    Route::controller(AuthController::class)->group(function(){
        Route::post('/login',  'login')->name("signup");
        Route::post('/logout',  'logout')->name('logout');
    });
});

// Dashboard handlers
Route::controller(DashboardController::class)
->name('dashboard.')
->prefix('dashboard')
->group(function(){
    Route::get('/',  'index')->name('index');
    Route::get('/users',  'users')->name('users');
    Route::get('/orders',  'orders')->name('orders');
    Route::get('/categories',  'categories')->name('categories');
});

// cart routes
Route::controller(CartController::class)
->name('cart.')
->prefix('cart')
->group(function(){
    Route::get('/','index')->name('index');
    Route::post('/add','add')->name('add');
    Route::post('/remove','remove')->name('remove');
    Route::post('/edit','edit')->name('edit');
});

// checkout route
Route::controller(CheckoutController::class)
->name('checkout.')
->prefix('checkout')
->group(function(){
    Route::get('/',  'index')->name('index');
    Route::get('/pay', 'store')->name('pay');
});

// Order controller
Route::controller(OrderController::class)
->name('order.')
->group(function(){
    Route::get('/orders', 'index')->name('index');
    Route::get('/order/create',  'store')->name('create');
});