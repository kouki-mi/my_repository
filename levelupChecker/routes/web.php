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

// Route::get('/', function () {
//     return view('welcome');
// });

//記録データ(growths)関連のルーティング
Route::get('/growths/index', 'App\Http\Controllers\GrowthController@index')->name('growths.index');
Route::get('/growths/create', 'App\Http\Controllers\GrowthController@showCreateForm')->name('growths.create');
Route::post('/growths/create', 'App\Http\Controllers\GrowthController@create');

//やった事(exps)関連のルーティング
Route::get('/exps/index', 'App\Http\Controllers\ExpController@index')->name('exps.index');
Route::get('/exps/create', 'App\Http\Controllers\ExpController@showCreateForm')->name('exps.create');
Route::post('/exps/create', 'App\Http\Controllers\ExpController@create');