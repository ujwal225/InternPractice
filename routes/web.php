<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/product/productCreate', [productController::class, 'create'])->name('product.productCreate');
Route::get('/product/productList', [productController::class, 'index'])->name('product.productList');
Route::post('/product/productStore',[productController::class, 'store'])->name('product.productStore');
Route::get('/product/productEdit/{id}/edit', [productController::class, 'edit'])->name('product.productEdit');
Route::put('/product/productUpdate/{id}', [productController::class, 'update'])->name('product.productUpdate');
Route::delete('/product/productDelete/{id}', [productController::class, 'destroy'])->name('product.productDelete');

Route::get('/category/categoryCreate', [CategoryController::class, 'create'])->name('category.categoryCreate');
Route::get('/category/categoryList', [CategoryController::class, 'index'])->name('category.categoryList');
Route::post('/category/categoryStore',[CategoryController::class, 'store'])->name('category.categoryStore');
Route::get('/category/categoryEdit/{id}/edit', [CategoryController::class, 'edit'])->name('category.categoryEdit');
Route::put('/category/categoryUpdate/{id}', [CategoryController::class, 'update'])->name('category.categoryUpdate');
Route::delete('/category/categoryDelete/{id}', [CategoryController::class, 'destroy'])->name('category.categoryDelete');
