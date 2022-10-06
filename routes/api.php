<?php

use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register',[LoginController::class,'register']);
Route::post('login',[LoginController::class,'login']);

Route::middleware('auth:sanctum')->group(function(){




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
Route::middleware('auth:sanctum')->group(function(){

        Route::prefix('property')->group(function () {
             Route::get('',[PropertyController::class,'index']);
             Route::get('{id}',[PropertyController::class,'editpropery'])->name('property.geteditblog'); // get id
             Route::post('/create',[PropertyController::class,'store'])->name('property.create');
             route::post('/edit/{id}',[PropertyController::class,'update'])->name('property.edit');
             route::delete('/delete/{id}',[PropertyController::class,'destroy'])->name('property.delete');


            });


            });

});
