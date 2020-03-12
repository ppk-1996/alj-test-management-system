<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('index');
});

Route::get('/test','TestsController@index')->name('test.index');

Route::get('/test/show/{question}','TestsController@show')->name('test.show');
Route::get('/test/{question}/{answer}','TestsController@edit')->name('test.edit');



Route::post('/test','TestsController@store')->name('test.store');
Route::put('/test/{answer}','TestsController@update')->name('test.update');

Route::get('/test/example/show/{question}','TestsController@showExample')->name('test.example.show');
Route::post('/test/example/calculate/{question}','TestsController@calculateExample')->name('test.example.calculate');





Auth::routes();

Route::name('admin.')->middleware('can:manage-users')->group(function () {
    Route::resource('admin/users', 'Admin\UsersController')->except(['create','store']);
});


Route::resource('/admin/questions', 'QuestionsController')->middleware('can:manage-questions');
