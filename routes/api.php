<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\BannerSliderController;
use App\Http\Controllers\Api\ApiEntertainmentController;

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
    Route::get('/bannerslider/{location}',[BannerSliderController::class,'slider']);
        // Your routes here...
});

Route::get('/show/{id}',[BannerSliderController::class,'show']);
Route::get('/test',[TestController::class,'index']);

Route::get('/article/{id}',[ArticleController::class,'show']);
Route::get('/articles',[ArticleController::class,'index']);
Route::get('/articlescategories/{limits?}/{categories?}',[ArticleController::class,'articlescategories']);

Route::get('/programs',[ProgramController::class,'index']);

Route::get('/series',[SeriesController::class,'index']);

Route::get('/schedule',[ScheduleController::class,'index']);


Route::get('/entertainments',[ApiEntertainmentController::class,'index']);