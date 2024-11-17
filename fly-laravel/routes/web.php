<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index'])->name('product.index');

Route::get('/product/add', [ProductController::class, 'showForm'])->name('product.add');  // Show the add product form
Route::post('/product/save', [ProductController::class, 'saveProduct'])->name('product.store');  // Save the product
Route::post('/product/mass-delete', [ProductController::class, 'massDelete'])->name('product.massDelete');  // Mass delete
