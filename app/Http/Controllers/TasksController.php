<?php

namespace App\Http\Controllers;

use App\{
    User,
    Task,
    Status
};
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Validator, View, Session, Redirect};

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index()
    {
        $tasks = Task::all();
        return View::make('tasks.index')
            ->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Renderable
     */
    public function create()
    {
        return View::make('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
//            'name'       => 'required',
//            'email'      => 'required|email',
//            'nerd_level' => 'required|numeric'
        );

        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('tasks/create')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {

            $task = new Task;
            $task->title    = $request->get('title');
            $task->body     = $request->get('body');
            $task->priority = $request->get('priority');
            $task->status_id = $request->get('status_id');
            $task->responsible_person_id = $request->get('responsible_person_id');
            $task->save();

            Session::flash('message', 'Successfully created task!');
            return Redirect::to('tasks');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Renderable
     */
    public function show($id)
    {
        $task = Task::find($id);

        return View::make('tasks.show')
            ->with('task', $task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Renderable
     */
    public function edit($id)
    {
        // get the nerd
        $task = Task::find($id);

        // show the edit form and pass the nerd
        return View::make('tasks.edit')
            ->with('task', $task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param string $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
//            'name'       => 'required',
//            'email'      => 'required|email',
//            'nerd_level' => 'required|numeric'
        );

        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('tasks/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // store
            $task = Task::find($id);
            $task->title    = $request->get('title');
            $task->body     = $request->get('body');
            $task->priority = $request->get('priority');
            $task->status_id = $request->get('status_id');
            $task->responsible_person_id = $request->get('responsible_person_id');
            $task->save();

            // redirect
            Session::flash('message', 'Successfully updated nerd!');
            return Redirect::to('tasks');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        Task::find($id)->delete();
        Session::flash('message', 'Successfully deleted the task!');
        return Redirect::to('tasks');
    }
}
