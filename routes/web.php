<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExamController;
use Illuminate\Support\Facades\Route;


Route::get('/',function()
{
    return redirect()->route('login.index');
});

Route::get('/login',[AuthController::class,'index'])->name("login.index");

Route::get('/logout',[AuthController::class,'logout'])->name("logout");

Route::post('/login',[AuthController::class,'login'])->name("login");

Route::middleware('auth')->group(function(){
    
    // home page
    Route::get('/home',function(){
        return view('home');
    })->name("home");

    //exams page
    Route::resource('exam',ExamController::class);

    Route::post('/search',[ExamController::class,'SearchTitle'])->name('Search.Title');

    // Route::get('/name/{id?}',[ExamController::class,'testGetParam'])->name("testGetParam");

});



