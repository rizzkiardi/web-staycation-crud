<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HotelController;
use App\Http\Controllers\Api\CategoryController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/login', [AuthController::class, 'login']);

Route::get('/v1/category', [CategoryController::class, 'index']);
Route::post('/v1/category', [CategoryController::class, 'store']);
Route::get('/v1/category/{id}', [CategoryController::class, 'show']);
Route::put('/v1/category/{id}', [CategoryController::class, 'update']);
Route::delete('/v1/category/{id}', [CategoryController::class, 'destroy']);

Route::get('/v1/hotel', [HotelController::class, 'index']);
Route::post('/v1/hotel', [HotelController::class, 'store']);
Route::get('/v1/hotel/{id}', [HotelController::class, 'show']);
Route::put('/v1/hotel/{id}', [HotelController::class, 'update']);
Route::delete('/v1/hotel/{id}', [HotelController::class, 'destroy']);
