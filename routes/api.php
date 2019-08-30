<?php

use Illuminate\Http\Request;

Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');
Route::post('/logout', 'AuthController@logout');

Route::get('/user', 'AuthController@user');

Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function () {

    Route::group(['prefix' => 'games'], function () {
        Route::post('/', 'GameController@getBonus');
    });

    Route::group(['prefix' => 'bonuses'], function() {
        Route::post('/convert', 'BonusController@convertMoneyBonusToPoints');
    });

    Route::group(['prefix' => 'payments'], function () {
        Route::post('/send', 'PaymentController@send');
    });
});
