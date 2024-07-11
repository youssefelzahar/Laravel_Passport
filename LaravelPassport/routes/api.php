<?php

use App\Http\Controllers\AuthApiController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TestApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


Route::post('login',[AuthApiController::class,'login']);

Route::prefix('user')->middleware('api_auth')->group(function(){
 Route::get('info',[TestApiController::class,'getUser']);

});