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
//Route::group(['prefix' => 'star'],function($router) {
//    Route::post('add',[\App\Http\Controllers\PostStarController::class,'addPostStar']);
//    Route::post('image',[\App\Http\Controllers\PostStarController::class,'image']);
//});
Route::group(['prefix' => 'list'],function($router) {
    Route::get('enterprise',[\App\Http\Controllers\ListController::class,'enterPrise']);
    Route::get('industry',[\App\Http\Controllers\ListController::class,'Industry']);
    Route::get('media',[\App\Http\Controllers\ListController::class,'Media']);
    Route::get('recruit',[\App\Http\Controllers\RecruitController::class,'RecruitList']);
});
Route::group(['prefix' => 'details'],function($router) {
    Route::get('enterprise',[\App\Http\Controllers\DetailController::class,'Details']);
    Route::get('industry',[\App\Http\Controllers\DetailController::class,'Details']);
    Route::get('media',[\App\Http\Controllers\DetailController::class,'Details']);
    Route::get('recruit',[\App\Http\Controllers\RecruitController::class,'Recruit']);
});
Route::group(['prefix' => 'paging'],function($router) {
    Route::get('corporate/{title?}',[\App\Http\Controllers\ArticleController::class,'Corporate']);
    Route::get('responsibility/{title?}',[\App\Http\Controllers\ArticleController::class,'Responsibility']);
    Route::get('original/{title?}',[\App\Http\Controllers\ArticleController::class,'Original']);
    Route::get('electronics/{title?}',[\App\Http\Controllers\ArticleController::class,'Electronics']);
    Route::get('journal/{title?}',[\App\Http\Controllers\ArticleController::class,'Journal']);
    Route::get('export/{title?}',[\App\Http\Controllers\ArticleController::class,'Export']);
    Route::get('bookFair/{title?}',[\App\Http\Controllers\ArticleController::class,'BookFair']);
    Route::get('data/{title?}',[\App\Http\Controllers\ArticleController::class,'Data']);
    Route::get('professional/{title?}',[\App\Http\Controllers\ArticleController::class,'Professional']);
});
