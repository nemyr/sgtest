<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return view('user/index');
});

Route::get('/user', function () {
    return view('user/index');
});

Route::post('/user/getprize', 'UserController@getPrizeAction');
Route::post('/prize/getMoneyAction', 'PrizeController@getMoneyAction')->name("money");
Route::post('/prize/convertMoneyAction', 'PrizeController@convertMoneyAction')->name("convert");
Route::post('/prize/getObjectAction', 'PrizeController@getObjectAction')->name("object");
Route::post('/prize/getBonusAction', 'PrizeController@getBonusAction')->name("bonus");
