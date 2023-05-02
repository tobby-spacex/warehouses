<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\WarehouseProductController;

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

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // Warehouse routes
    Route::get('/warehouse', [WarehouseController::class, 'index'])->name('warehouse.index');
    Route::get('/warehouse/create', [WarehouseController::class, 'create'])->name('warehouse.create');
    Route::post('/warehouse', [WarehouseController::class, 'store'])->name('warehouse.store');
    Route::get('/warehouse/{warehouse}/edit', [WarehouseController::class, 'edit'])->name('warehouse.edit');
    Route::put('/warehouse/{warehouse}', [WarehouseController::class, 'update'])->name('warehouse.update');
    Route::delete('/warehouse/{id}', [WarehouseController::class, 'destroy'])->name('warehouse.destroy');

    // Warehouse product routes
    Route::get('/warehouse/{warehouse}/manage', [WarehouseProductController::class, 'show'])->name('warehouse.manage');
    Route::post('/warehouse/{warehouse}', [WarehouseProductController::class, 'store'])->name('warehouse.product');
    Route::delete('/warehouse.product/{warehouse}', [WarehouseProductController::class, 'destroy'])->name('warehouse.product.destroy');

    // Product routes
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::get('/product/list', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::post('/product', [ProductController::class, 'store'])->name('product.store');
    Route::put('/product/{product}', [ProductController::class, 'update'])->name('product.update');
});

require __DIR__.'/auth.php';
