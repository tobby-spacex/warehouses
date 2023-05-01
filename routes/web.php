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
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/warehouse', [WarehouseController::class, 'index'])->middleware('auth')->name('warehouse');
Route::get('/warehouse/create', [WarehouseController::class, 'create']);
Route::post('/warehouse', [WarehouseController::class, 'store'])->name('warehouse.store');
Route::put('/warehouse/{warehouse}', [WarehouseController::class, 'update']);
Route::delete('/warehouse/{id}', [WarehouseController::class, 'destroy'])->name('warehouse.destroy');

/**
 * WarehouseController
 */
Route::get('/warehouse/{warehouse}/edit', [WarehouseController::class, 'edit']);

/**
 * WarehouseProductController
 */
Route::get('/warehouse/{warehouse}/manage', [WarehouseProductController::class, 'show'])->name('warehouse.manage');
Route::post('/warehouse/{warehouse}', [WarehouseProductController::class, 'store'])->name('warehouse.product');
Route::delete('/warehouse.product/{warehouse}', [WarehouseProductController::class, 'destroy']);

/**
 * ProductController
 */
Route::get('/product/create', [ProductController::class, 'create']);
Route::get('/product/list', [ProductController::class, 'index']);

//Show Edit Form
Route::get('/product/{product}/edit', [ProductController::class, 'edit']);

//Delete a product
Route::delete('/product/{product}', [ProductController::class, 'destroy']);

Route::post('/product', [ProductController::class, 'store'])->name('product.store');
Route::put('/product/{product}', [ProductController::class, 'update']);

require __DIR__.'/auth.php';
