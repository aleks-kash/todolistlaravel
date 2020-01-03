<?php

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

use Illuminate\Support\Facades\{
    Auth,
    Route,
};

Route::get('/', 'TasksController@index');

Route::group(['prefix' => 'tasks', 'middleware' => 'auth'], function () {

    Route::group(['namespace' => 'Ajax', 'prefix' => 'ajax'], function () {
        Route::post('/update/positions', 'TasksController@updatePositions')->name('updateTasksPosition');
    });

    Route::get('/position', 'TasksController@position');

});

Route::resource('/tasks', 'TasksController');

Auth::routes();
