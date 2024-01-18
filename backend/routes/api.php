<?php

use App\Http\Controllers\admin\articles\ArticleController;
use App\Http\Controllers\admin\categories\CategoryController;
use App\Http\Controllers\admin\subCategories\SubCategoyController;
use App\Http\Controllers\auth\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware'=>['auth:sanctum']],function(){

});

Route::post('/register',[UserController::class,"register"]);
Route::post('/login',[UserController::class,"login"]);
Route::apiResource('/categories',CategoryController::class);
Route::apiResource('/sub_Category',SubCategoyController::class);
Route::apiResource('articles',ArticleController::class);
