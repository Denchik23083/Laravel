<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Models\Category;

require __DIR__.'/auth.php';

Route::resource('/', ProductsController::class);
Route::resource('/category', CategoryController::class);
Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/edit/{id}', [DashboardController::class, 'showEdit']);
Route::get('/edit', [DashboardController::class, 'uptodate']);
Route::get('/product/{id}', [DashboardController::class, 'showProduct']);
Route::get('/deletecategory/{id}', [CategoryController::class, 'showDelete']);
Route::get('/deletecategory/delete/{id}', [CategoryController::class, 'deleteCategory']);

Route::get('/editcategory', [CategoryController::class, 'uptodate']);
Route::get('/editcategory/{id}', [CategoryController::class, 'showEdit']);
Route::get('/exit', [DashboardController::class, 'logout']);

Route::view('/addproduct','add/product');
Route::post('addproduct', [DashboardController::class, 'addProduct']);
Route::view('addcategory','add/category');
Route::post('addcategory', [CategoryController::class, 'addCategory']);

Route::get('replenish', [DashboardController::class, 'replenish']);
Route::get('/endreplenish', [DashboardController::class, 'endreplenish']);

Route::get('/product/deleteProduct/{id}', [DashboardController::class, 'deleteProduct']);
Route::get('/category/product/{id}', [DashboardController::class, 'showProduct']);
Route::get('/deleteProduct/{id}', [DashboardController::class, 'deleteAdminProduct']);