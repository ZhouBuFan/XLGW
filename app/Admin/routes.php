<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('stars', StarController::class);
    $router->resource('enterpriselist', EnterpriseController::class);
    $router->resource('industry', IndustryController::class);
    $router->resource('media', MediaController::class);
    $router->resource('articles', ArticleController::class);
    $router->resource('recruits', RecruitController::class);
    $router->resource('links', LinkController::class);
});
