<?php

use App\Http\Controllers\api\LoginController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


Route::post('/login',[LoginController::class,'MakeLogin']);
Route::post('/register',[LoginController::class,'MakeRegister']);
Route::get('/Get/Data',[LoginController::class,'GetData']);
Route::post('/Add/Task',[LoginController::class,'AddTask'])->middleware('jwt_verify');
Route::delete('/Delete/Task/{id?}',[LoginController::class,'DeleteTask'])->middleware('jwt_verify');
Route::put('/Edit/Task/{id?}',[LoginController::class,'EditTask'])->middleware('jwt_verify');
Route::post('/Update/Task',[LoginController::class,'UpdateTask'])->middleware('jwt_verify');





