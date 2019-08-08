<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'api/Leslie\elasticsearch',
    'namespace' => 'Leslie\elasticsearch\Controllers',
    'middleware' => config('elasticsearch.middleware.auth')
], function () {
    //获取当前工程师授权业务列表
    Route::get('getBusinessesList', "BusinessesController@getBusinessesList");
});

