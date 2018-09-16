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
        
        });
    });

    Route::prefix('game')->group(function () {

    });

});

Route::post('auth/register', 'UserController@register');
