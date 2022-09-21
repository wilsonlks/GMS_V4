<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostGuzzleController;
use App\Http\Controllers\loadXmlController;
use App\Http\Controllers\receiveContronller;






/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/test', function () {
    return view('test');
});


// Route::get('/senderHistory', function () {
//     return view('senderHistory');
// });




// Route::get('/dashboard', function () {
//     return view('dashboard');
// });


Route::get('login', [LoginController::class, 'Login']);
//Route::post('login', [LoginController::class, 'login']);
Route::get('senderPages',[PostGuzzleController::class, 'senderPage']);
Route::post('senderProcess',[PostGuzzleController::class, 'senderProcess']);
Route::get('previewpage',[PostGuzzleController::class, 'previewpage']);
Route::get('sendMessage',[PostGuzzleController::class, 'sendMessage']);
Route::get('senderHistory',[PostGuzzleController::class, 'senderHistory']);


Route::get('show',[PostGuzzleController::class, 'show']);


Route::get('receivexml',[receiveContronller::class, 'receivexml']);
Route::get('successfulpage',[PostGuzzleController::class, 'successfulpage']);

Route::get('logMessage', [HomeController::class, 'logMessage']);

Route::get('dashboardV2', [HomeController::class, 'dashboardV2']);






