<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CallsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/login',[AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

Route::get('/calls',[CallsController::class,'calls']);
Route::middleware('auth:sanctum')->group(function (){

});
