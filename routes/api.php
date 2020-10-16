<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


// Route::post('list','Users@list');

Route::get('/posts','App\Http\Controllers\ApiController@getPost');
Route::post('/posts','App\Http\Controllers\ApiController@createPost');
Route::get('/posts/{id}','App\Http\Controllers\ApiController@getPostById');

Route::get('/comments','App\Http\Controllers\ApiController@getComment');
Route::post('/comments','App\Http\Controllers\ApiController@createComment');

Route::get('/posts/{postId}/comments','App\Http\Controllers\ApiController@getCommentById');

Route::get('/users','App\Http\Controllers\ApiController@getDetail');
Route::post('/users','App\Http\Controllers\ApiController@createDetail');

Route::get('/users/{id}','App\Http\Controllers\ApiController@getDetailById');

Route::post('/csv','App\Http\Controllers\ApiController@readCsv');

Route::get('/csv','App\Http\Controllers\ApiController@getCsv');

