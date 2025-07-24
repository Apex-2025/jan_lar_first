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

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'task'], function () {

    Route::get('/', 'TaskController@index')->name('task.index');

    Route::get('/create', 'TaskController@create')->name('task.create');

    Route::post('/', 'TaskController@store')->name('task.store');

    Route::get('/{task}/edit', 'TaskController@edit')->name('task.edit');

    Route::put('/{task}', 'TaskController@update')->name('task.update');

    Route::delete('/{task}', 'TaskController@destroy')->name('task.destroy');
});
