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

Route::get('results', 'ResultController@getResults');

Route::get('capture', 'ToolController@getCapture');
Route::get('market', 'ToolController@getMarket');

Route::get('database', 'ToolController@getDatabase');
Route::get('replicator', 'ToolController@getReplicator');

Route::get('simulate', 'ToolController@getSimulate');
Route::get('cleanup', 'ToolController@getCleanup');