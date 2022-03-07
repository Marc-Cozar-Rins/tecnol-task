<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\Front\ReviewController;


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

Route::get('/', [HomeController::class,'index'])->name('front.home');

Route::prefix('/products')->group(function () {

    Route::get('/', [ProductController::class,'index'])->name('front.products');
    Route::get('/{product}', [ProductController::class,'show'])->name('front.products.show');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/products/{product}/review', [ReviewController::class,'store'])->name('front.reviews.store');

});


Auth::routes();
