<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'star'],function($router) {
    Route::post('add',[\App\Http\Controllers\PostStarController::class,'addPostStar']);
    Route::post('image',[\App\Http\Controllers\PostStarController::class,'image']);
});
Route::group(['prefix' => 'list'],function($router) {
    Route::post('enterprise',[\App\Http\Controllers\ListController::class,'enterPrise']);
});
