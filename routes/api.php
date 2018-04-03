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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// TODO : Implement Auth Guard

Route::get('articles', 'ArticlesController@index'); 
Route::get('articles/{article}', 'ArticlesController@show');
Route::post('articles','ArticlesController@store');
Route::put('articles/{article}','ArticlesController@update');
Route::delete('articles/{article}', 'ArticlesController@delete');

Route::get('categories', 'CategoriesController@index'); 
Route::get('categories/{category}', 'CategoriesController@show');
Route::post('categories','CategoriesController@store');
Route::put('categories/{category}','CategoriesController@update');
Route::delete('categories/{category}', 'CategoriesController@delete');


Route::post('session', 'SessionController@checkuser');