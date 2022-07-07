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
    Route::get('enterprise',[\App\Http\Controllers\ListController::class,'enterPrise']);
    Route::get('industry',[\App\Http\Controllers\ListController::class,'Industry']);
    Route::get('media',[\App\Http\Controllers\ListController::class,'Media']);
});
Route::group(['prefix' => 'details'],function($router) {
    Route::get('enterprise',[\App\Http\Controllers\DetailController::class,'Details']);
    Route::get('industry',[\App\Http\Controllers\DetailController::class,'Details']);
    Route::get('media',[\App\Http\Controllers\DetailController::class,'Details']);
});
Route::group(['prefix' => 'paging'],function($router) {
    Route::get('corporate/{title?}',[\App\Http\Controllers\ArticleController::class,'Corporate']);
    Route::get('corporate/{title?}',[\App\Http\Controllers\ArticleController::class,'Corporate']);
    Route::get('corporate/{title?}',[\App\Http\Controllers\ArticleController::class,'Corporate']);
    Route::get('corporate/{title?}',[\App\Http\Controllers\ArticleController::class,'Corporate']);
    Route::get('corporate/{title?}',[\App\Http\Controllers\ArticleController::class,'Corporate']);
    Route::get('corporate/{title?}',[\App\Http\Controllers\ArticleController::class,'Corporate']);
    Route::get('corporate/{title?}',[\App\Http\Controllers\ArticleController::class,'Corporate']);
});
