<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Route::prefix('products')->group(function(){

//     Route::get('/',[ProductController::class,'index']);



//     });



Route::prefix('products')->group(function(){


    Route::get('/',[ProductController::class,'index']);

    Route::post('/',[ProductController::class,'store']);

    Route::put('/{id}',[ProductController::class,'update']);

    Route::delete('/{id}',[ProductController::class,'destroy']);

    Route::get('/{id}',[ProductController::class,'show']);







});

