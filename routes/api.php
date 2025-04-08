<?php

use Illuminate\Support\Facades\Route;

use Src\event\category\infrastructure\controllers\CreateCategoryController;
use Src\event\category\infrastructure\controllers\GetCategoryController;
use Src\event\category\infrastructure\controllers\UpdateCategoryController;
use Src\event\category\infrastructure\controllers\DeleteCategoryController;
use Src\event\product\infrastructure\controllers\GetProductController;




use Src\event\product\infrastructure\controllers\CreateProductController;

use Src\event\product\infrastructure\controllers\UpdateProductController;
//Category
//metodo post
Route::post('/category', [CreateCategoryController::class, 'store']);
//metodo get
Route::get('/category', [GetCategoryController::class, 'index']);
//metodo update
Route::put('/category/{id}', [UpdateCategoryController::class, 'update']);
//metodo delete
Route::delete('/category/{id}', [DeleteCategoryController::class, 'delete']);

//Product
//metodo post
Route::post('/product', [CreateProductController::class, 'store']);
//metodo get
Route::get('/product', [GetProductController::class, 'index']);
//metodo update
Route::put('/product/{id}', [UpdateProductController::class, 'update']);

