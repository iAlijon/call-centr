<?php

use App\Http\Controllers\AdminAddOperatorController;
use App\Http\Controllers\CallRegistrationController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ThemesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);

Route::middleware('auth:api')->group(function (){
    Route::apiResource('category', CategoryController::class);
    Route::get('question_list', [QuestionController::class, 'index']);
    Route::post('question', [QuestionController::class, 'store']);
    Route::apiResource('call_registration', CallRegistrationController::class);
    Route::apiResource('theme', ThemesController::class);
    Route::get('operator_create', [AdminAddOperatorController::class, 'index']);
    Route::post('operator_create', [AdminAddOperatorController::class, 'store']);
    Route::get('operator_create/{id}', [AdminAddOperatorController::class, 'show']);
    Route::put('operator_create/{id}', [AdminAddOperatorController::class, 'update']);
});
