<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Src\event\category\infrastructure\controllers\CategoryController;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');
//
//Route::prefix('event_category')->group(base_path('src/event/category/infrastructure/routes/api.php'));
//

//Category
Route::resource('categories', CategoryController::class);
