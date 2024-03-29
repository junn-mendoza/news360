<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MainController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\DetailController;
use App\Http\Controllers\Api\EntertainmentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('news360key')->group(function () {
        // Your routes here...
    Route::get('/main',[MainController::class, 'index']); 
    Route::get('/entertainment',[EntertainmentController::class, 'index']); 
    Route::get('/news',[NewsController::class, 'index']); 
    Route::get('/news/{slug}',[DetailController::class, 'index']); 
});


