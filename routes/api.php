<?php

use App\Http\Controllers\BarCodeScanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\NutritionController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CountryController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use Laravel\Passport\Token;

Route::apiResource('products', ProductController::class);
Route::apiResource('ingredients', IngredientController::class);
Route::apiResource('nutrition', NutritionController::class);
Route::apiResource('brands', BrandController::class);
Route::apiResource('countries', CountryController::class);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/by-barcode', [BarCodeScanController::class, 'showByBarCode']);
 





  




 


