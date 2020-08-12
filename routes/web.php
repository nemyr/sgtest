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
})->middleware('auth');

Route::get('/user', function () {
    return view('user/index');
})->name('index')->middleware('auth');

Route::post('/user/getprize', 'UserController@getPrizeAction')->middleware('auth')->middleware('auth');
Route::post('/prize/getMoneyAction', 'PrizeController@getMoneyAction')->name("money")->middleware('auth');
Route::post('/prize/convertMoney', 'PrizeController@convertMoneyAction')->name("convert")->middleware('auth');
Route::post('/prize/getObject', 'PrizeController@getObjectAction')->name("object")->middleware('auth');
Route::post('/prize/getBonus', 'PrizeController@getBonusAction')->name("bonus")->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
