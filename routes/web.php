<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\Home\TestController;
use App\Http\Controllers\News\DetailController;
use App\Http\Controllers\Entertainment\EntertainmentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [TestController::class,'index']);

Route::get('/news', [NewsController::class,'index']);

Route::get('/entertainment', [EntertainmentController::class,'index']);

Route::get('/news/{id}', [DetailController::class,'show']);
