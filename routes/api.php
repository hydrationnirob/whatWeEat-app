<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\NutritionController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CountryController;

Route::apiResource('products', ProductController::class);
Route::apiResource('ingredients', IngredientController::class);
Route::apiResource('nutrition', NutritionController::class);
Route::apiResource('brands', BrandController::class);
Route::apiResource('countries', CountryController::class);


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
