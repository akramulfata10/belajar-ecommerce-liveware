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
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
    // route category

    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('/category', 'index');
        Route::get('/category/create', 'create');
        Route::post('/category', 'store');
        Route::get('/category/{category_id}/update', 'edit');
        Route::put('/category/{category_id}', 'update');
        // 'admin/category/' . $category->id
        // admin/dashboard/' . $category->id . '/edit'
        // Route::get('category', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
        // Route::get('category/create', [App\Http\Controllers\Admin\CategoryController::class, 'create']);
        // Route::post('category', [App\Http\Controllers\Admin\CategoryController::class, 'store']);
    });

    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('/products', 'index');
        Route::get('/products/create', 'create');
        Route::post('/products', 'store');
        Route::get('/products/{product_id}/edit', 'edit');
        Route::put('/products/{product_id}', 'update');
        Route::get('/products/{product_id}/delete', 'destroy');
        Route::get('product-image/{product_image_id}/delete', 'destroyImage');
    });

    Route::controller(App\Http\Controllers\Admin\ColorController::class)->group(function () {
        Route::get('/colors', 'index');
        Route::get('/colors/create', 'create');
        Route::post('/colors', 'store');
        Route::get('/colors/{color}/edit', 'edit');
        Route::put('/colors/{color_id}/', 'update');
        Route::get('/colors/{color_id}/delete', 'destroy');
    });

    Route::get('/brands', App\Http\Livewire\Admin\Brand\Index::class);

});
