<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\ProductController;
use App\Http\Controllers\Back\CategoryController;
use App\Http\Controllers\Back\ReviewController;

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

Route::middleware(['is_admin'])->group(function () {
    
    Route::prefix('back')->group(function () {
        
        Route::prefix('/products')->group(function () {
            Route::get('/', [ProductController::class,'index'])->name('back.products');
            Route::get('/delete/{product}', [ProductController::class,'delete'])->name('back.products.delete');
            Route::get('/edit/{product}', [ProductController::class,'edit'])->name('back.products.edit');
            Route::get('/create', [ProductController::class,'create'])->name('back.products.create');
            Route::post('/update/{product}', [ProductController::class,'update'])->name('back.products.update');
            Route::post('/store', [ProductController::class,'store'])->name('back.products.store');
        });

        Route::prefix('/categories')->group(function () {
            Route::get('/', [CategoryController::class,'index'])->name('back.categories');
            Route::get('/delete/{category}', [CategoryController::class,'delete'])->name('back.categories.delete');
            Route::get('/edit/{category}', [CategoryController::class,'edit'])->name('back.categories.edit');
            Route::get('/create', [CategoryController::class,'create'])->name('back.categories.create');
            Route::post('/update/{category}', [CategoryController::class,'update'])->name('back.categories.update');
            Route::post('/store', [CategoryController::class,'store'])->name('back.categories.store');
        });

        Route::prefix('/reviews')->group(function () {
            Route::get('/', [ReviewController::class,'index'])->name('back.reviews');
            Route::get('/delete/{review}', [ReviewController::class,'delete'])->name('back.reviews.delete');
        });
    });
});