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

use App\Models\Entities\Task;
use Illuminate\Support\Facades\{
    DB,
    Auth,
    Route,
    Request,
    Response,
};

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/tasks/search/{priority?}/{status?}/{person?}', 'TasksController@search');

Route::get('/', 'TasksController@index');

Route::group(['prefix' => 'tasks', 'middleware' => 'auth'], function () {

    Route::group(['namespace' => 'Ajax', 'prefix' => 'ajax'], function () {
        Route::post('/update/positions', 'TasksController@updatePositions')->name('updateTasksPosition');
    });

    Route::get('/position', 'TasksController@position');
    Route::resource('/', 'TasksController');

});




//Route::post('/ajax/search', function () {
//    return Response::json(Request::all());
//})
////    ->middleware('verified', 'only.ajax')
////    ->middleware('only.ajax')
//    ->middleware('verified')
//;



//
//Route::get('/tasks/{task}', function ($id) {
////    $task = DB::table('tasks')->find($id);
//    $task = Task::find($id);
//    dd($task);
//    return view('tasks.show', compact('task'));
//});

Auth::routes();

//Route::get('/site', 'SiteController@index')->name('site');

