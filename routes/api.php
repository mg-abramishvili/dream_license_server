<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\KeyApiController;

Route::group(['prefix' => 'key'], function () {
    Route::get('edit/{id}', 'App\Http\Controllers\KeyApiController@edit');
    Route::post('update/{id}', 'App\Http\Controllers\KeyApiController@update');
    Route::get('view/{key}', 'App\Http\Controllers\KeyApiController@view');
    Route::post('activate/{key}', 'App\Http\Controllers\KeyApiController@activate');
});
