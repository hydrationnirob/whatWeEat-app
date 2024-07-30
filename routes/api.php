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


//Get All user data 
Route::get('/users', function (Request $request) {
    return \App\Models\User::all();
});

//login user and how to use it in postman  

// 1. Open Postman
// 2. Select POST method
// 3. Enter the URL http://localhost:8000/api/login
// 4. Click on the Body tab
// 5. Select x-www-form-urlencoded
// 6. Enter the key-value pairs for email and password
// 7. Click on the Send button


Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');
    try {
        if (\Auth::attempt($credentials)) {
            $user = \Auth::user();
            $token = $user->createToken('authToken')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }
    } catch (\Exception $e) {
        return response()->json(['error' => 'Unknow Error'], 500);
    }
});

/*
{
  "email": "admin@gmail.com",
  "password": "admin"
}

*/




 


