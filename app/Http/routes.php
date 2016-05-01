<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Front-End (Consumer)

Route::get('capture', [
    'as' => 'lead::capture', 'uses' => 'CaptureController@getLead'
]);

Route::post('capture', [
    'as' => 'post::lead', 'uses' => 'CaptureController@postLead'
]);

// Front-End (Marketer)

Route::get('market', [
    'as' => 'market::index', 'uses' => 'MarketController@index'
]);

// Back-End (Marketer)

Route::get('purchase/{lead}', [
    'as' => 'purchase', 'uses' => 'MarketController@checkout'
]);

Route::get('contacts', [
    'as' => 'contacts', 'uses' => 'UserController@index'
]);

// Back-End (Admin)

Route::get('admin', [
    'as' => 'admin::index', 'uses' => 'AdminController@index'
]);

// Authentication

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Hackathon (Demo Tools)

Route::get('simulate', 'ToolController@getSimulate');
Route::get('cleanup', 'ToolController@getCleanup');