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
Route::get('/growths/index', 'App\Http\Controllers\GrowthController@index')->name('growths.index')->middleware('auth'); //ログイン時のみ閲覧可能
Route::get('/growths/create', 'App\Http\Controllers\GrowthController@showCreateForm')->name('growths.create')->middleware('auth');
Route::post('/growths/create', 'App\Http\Controllers\GrowthController@create');
Route::get('/growths/edit', 'App\Http\Controllers\GrowthController@showEditForm')->name('growths.edit')->middleware('auth');
Route::post('/growths/edit', 'App\Http\Controllers\GrowthController@edit');
Route::get('/growths/delete', 'App\Http\Controllers\GrowthController@showDeleteForm')->name('growths.delete')->middleware('auth');
Route::post('/growths/delete', 'App\Http\Controllers\GrowthController@delete');

//やった事(exps)関連のルーティング
Route::get('/exps/index', 'App\Http\Controllers\ExpController@index')->name('exps.index')->middleware('auth');
Route::get('/exps/create', 'App\Http\Controllers\ExpController@showCreateForm')->name('exps.create')->middleware('auth');
Route::post('/exps/create', 'App\Http\Controllers\ExpController@create');
Route::get('/exps/edit', 'App\Http\Controllers\ExpController@showEditForm')->name('exps.edit')->middleware('auth');
Route::post('/exps/edit', 'App\Http\Controllers\ExpController@edit');
Route::get('/exps/delete', 'App\Http\Controllers\ExpController@showDeleteForm')->name('exps.delete')->middleware('auth');
Route::post('/exps/delete', 'App\Http\Controllers\ExpController@delete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
