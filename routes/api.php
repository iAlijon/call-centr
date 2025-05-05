<?php

use App\Http\Controllers\QuestionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);

Route::middleware('auth:api')->group(function (){
    Route::get('category', [CategoryController::class, 'index']);
    Route::post('category_create', [CategoryController::class, 'create']);
    Route::post('question', [QuestionController::class, 'store']);
});
