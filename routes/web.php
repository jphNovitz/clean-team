<?php

use App\Http\Controllers\Product\MissingProductsController;
use App\Http\Controllers\Product\ProductController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    
    Route::get('/missing', [MissingProductsController::class, 'index'])->middleware('share_products')->name('missing_products');
    Route::get('missing/available_products', [MissingProductsController::class, 'productsNotInJournal'])->name('products_not_in_journal');
    Route::put('missing/add_product_journal', [MissingProductsController::class, 'addProductInJournal'])->name('add_product_in_journal');
    Route::post('update_line', [MissingProductsController::class, 'updateLine'])->middleware('share_products')->name('missing_products_test');
    Route::post('/create_product', [ProductController::class, 'create'])->name('create_product');
    Route::put('/update_product', [ProductController::class, 'update'])->middleware('share_products')->name('update_product');
    Route::get('/missing/report', [MissingProductsController::class, 'report'])->middleware('share_products')->name('missing_report');
    Route::get('/design', function () {;
    })->name('design');
});
