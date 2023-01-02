<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    // dashboard
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    // banner
    Route::controller(App\Http\Controllers\Admin\BannerController::class)->group(function () {
        Route::get('/banners', 'index');
        Route::get('/banners/create', 'create');
        Route::post('/banners', 'store');
        Route::get('/banners/{banner}/edit', 'edit');
        Route::put('/banners/{banner}', 'update');
    });

    // kategori
    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('/category', 'index');
        Route::get('/category/create', 'create');
        Route::post('/category', 'store');
        Route::get('/category/{category}/edit', 'edit');
        Route::put('/category/{category}', 'update');
    });

    // produk
    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('/products', 'index');
        Route::get('/products/create', 'create');
        Route::post('/products', 'store');
        Route::get('/products/{product}/edit', 'edit');
        Route::put('/products/{product}', 'update');
        Route::get('/product-image/{product_image_id}/delete', 'destroyImage');
    });

    // sentra bibit
    Route::get('/sentra-bibit', App\Http\Livewire\Admin\SentraBibit\Index::class);
});
