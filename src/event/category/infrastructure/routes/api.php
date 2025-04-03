<?php
use Src\event\category\infrastructure\controllers\CategoryController;
//use Src\event\category\infrastructure\controllers\ExampleGETController;

// Simpele route example
// Route::get('/', [ExampleGETController::class, 'index']);

//Authenticathed route example
// Route::middleware(['auth:sanctum','activitylog'])->get('/', [ExampleGETController::class, 'index']);

Route::resource('categories', CategoryController::class);




