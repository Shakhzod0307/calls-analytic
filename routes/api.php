<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CallsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/login',[AuthController::class, 'login']);


Route::get('/calls/{number}/{year}',[CallsController::class,'calls']);
Route::middleware('auth:sanctum')->group(function (){
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/calls/{id}/rating',[CallsController::class,'rating']);
});
