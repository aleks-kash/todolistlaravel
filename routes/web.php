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

use App\Task;
use Illuminate\Support\Facades\{
    DB,
    Auth,
    Route,
};

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks/search/{priority?}/{status?}/{person?}', 'TasksController@search');

Route::resource('tasks', 'TasksController');


//Route::get('/tasks/seache', 'TasksController@show');

//Route::get('/tasks', function () {
////    $tasks = DB::table('tasks')->get();
//    $tasks = Task::all();
//    return view('tasks.index', compact('tasks'));
//});
//
//Route::get('/tasks/{task}', function ($id) {
////    $task = DB::table('tasks')->find($id);
//    $task = Task::find($id);
//    dd($task);
//    return view('tasks.show', compact('task'));
//});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

