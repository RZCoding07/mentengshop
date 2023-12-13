<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)->group(function(){
    Route::get('/signin', 'index')->name('signin');
    Route::get('/signup', 'signup')->name('signup');
    Route::get('/logout', 'logout')->name('logout');

    Route::post('/login', 'login')->name('login');
    Route::post('/register', 'register')->name('register');
});

Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'index')->name('home');
    Route::get('/product', 'product')->name('product');
    Route::get('/product/detail/{id}', 'product_detail');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/about', 'about')->name('about');
});

Route::controller(AdminController::class)->group(function(){
    Route::get('/dashboard', 'index')->name('dashboard');
    Route::get('/dashboard/users', 'users')->name('dashboard-users');
});

Route::controller(ProductController::class)->group(function(){
    Route::get('/dashboard/products', 'index')->name('dashboard-products');
    Route::get('/dashboard/products/add', 'add_products')->name('dashboard-products-add');
    Route::get('/dashboard/products/{id}', 'detail_products')->name('dashboard-products-detail');

    Route::post('/dashboard/products/store', 'store')->name('dashboard-products-store');
});

Route::controller(OrderController::class)->group(function (){
    Route::get('/dashboard/orders', 'index')->name('dashboard-orders');
    Route::get('/dashboard/orders/add', 'add_orders')->name('dashboard-orders-add');

    Route::post('/dashboard/orders/store', 'store')->name('dashboard-orders-store');
});