<?php

use Illuminate\Http\Request;

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
});
