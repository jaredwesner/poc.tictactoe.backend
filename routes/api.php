<?php

use Illuminate\Http\Request;

/**
 *  OAUTH Server
 */

 # POST     | oauth/authorize
 # GET|HEAD | oauth/authorize
 # DELETE   | oauth/authorize
 # POST     | oauth/clients
 # GET|HEAD | oauth/clients
 # PUT      | oauth/clients/{client_id}
 # DELETE   | oauth/clients/{client_id}
 # GET|HEAD | oauth/personal-access-tokens
 # POST     | oauth/personal-access-tokens
 # DELETE   | oauth/personal-access-tokens/{token_id}
 # GET|HEAD | oauth/scopes
 # POST     | oauth/token
 # POST     | oauth/token/refresh
 # GET|HEAD | oauth/tokens
 # DELETE   | oauth/tokens/{token_id}

Route::group(['middleware' => ['auth:api']], function () {

    Route::prefix('user')->group(function () {
        Route::get('', 'UserController@get');

        Route::prefix('game')->group(function () {
            Route::get('{game_id}', 'UserGameController@get');
            Route::post('start', 'UserGameController@start');
            Route::post('{game_id}/move', 'UserGameController@move');
            Route::put('{game_id}/reset', 'UserGameController@reset');
            Route::post('{game_id}/load', 'UserGameController@load');
        });
        Route::get('games', 'UserGameController@list');

    });

    // TODO:: allow for system integration for game
    Route::prefix('game')->group(function () {
        Route::post('start', 'GameController@start');
        Route::get('{game_token}', 'GameController@get');
        Route::post('{game_token}/move', 'GameController@makeMove');
        Route::put('{game_token}/reset', 'GameController@reset');
        Route::post('{game_token}/load', 'GameController@load');
    });

});

Route::post('auth/register', 'UserController@register');
