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
////Route::apiResource('sender', [senderController::class,'showAllSend']);
//Route::get('sender/{id}', 'senderController@showOneSend');
//Route::post('sender', 'senderController@create');
//Route::put('sender/{id}', 'senderController@update');
///Route::delete('sender/{id}', 'senderController@delete');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
 



