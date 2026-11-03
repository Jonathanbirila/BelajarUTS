<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionDetailController;

Route::get('/', function () {
    return redirect()->route('products.index');
});

/*
|--------------------------------------------------------------------------
| Routes untuk Products
|--------------------------------------------------------------------------
*/
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

/*
|--------------------------------------------------------------------------
| Routes untuk Suppliers
|--------------------------------------------------------------------------
*/
Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
Route::get('/suppliers/create', [SupplierController::class, 'create'])->name('suppliers.create');
Route::post('/suppliers', [SupplierController::class, 'store'])->name('suppliers.store');
Route::get('/suppliers/{supplier}', [SupplierController::class, 'show'])->name('suppliers.show');
Route::get('/suppliers/{supplier}/edit', [SupplierController::class, 'edit'])->name('suppliers.edit');
Route::put('/suppliers/{supplier}', [SupplierController::class, 'update'])->name('suppliers.update');
Route::delete('/suppliers/{supplier}', [SupplierController::class, 'destroy'])->name('suppliers.destroy');

/*
|--------------------------------------------------------------------------
| Routes untuk Transactions
|--------------------------------------------------------------------------
*/
Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
Route::get('/transactions/{transaction}', [TransactionController::class, 'show'])->name('transactions.show');
Route::get('/transactions/{transaction}/edit', [TransactionController::class, 'edit'])->name('transactions.edit');
Route::put('/transactions/{transaction}', [TransactionController::class, 'update'])->name('transactions.update');
Route::delete('/transactions/{transaction}', [TransactionController::class, 'destroy'])->name('transactions.destroy');

/*
|--------------------------------------------------------------------------
| Routes untuk Transaction Details
|--------------------------------------------------------------------------
*/
Route::get('/transaction-details', [TransactionDetailController::class, 'index'])->name('transaction-details.index');
Route::get('/transaction-details/create', [TransactionDetailController::class, 'create'])->name('transaction-details.create');
Route::post('/transaction-details', [TransactionDetailController::class, 'store'])->name('transaction-details.store');
Route::get('/transaction-details/{transactionDetail}', [TransactionDetailController::class, 'show'])->name('transaction-details.show');
Route::get('/transaction-details/{transactionDetail}/edit', [TransactionDetailController::class, 'edit'])->name('transaction-details.edit');
Route::put('/transaction-details/{transactionDetail}', [TransactionDetailController::class, 'update'])->name('transaction-details.update');
Route::delete('/transaction-details/{transactionDetail}', [TransactionDetailController::class, 'destroy'])->name('transaction-details.destroy');
