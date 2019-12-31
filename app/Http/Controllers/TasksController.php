<?php

namespace App\Http\Controllers;
use App\Models\Entities\{
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
     * Display a listing of the tasks.
     *
     * @return Renderable
     */
    public function index(Request $request, Task $task): Renderable
    {
        $taskQuery = $task->newQuery();
        if ($priority = $request->get('priority')){
            $taskQuery->byPriority($priority);
            $task->priority = $priority;
        }

        if ($status = $request->get('status')){
            $taskQuery->byStatus($status);
            $task->status = $status;
        }

        if ($person = $request->get('person')){
            $taskQuery->byPerson($person);
            $task->person = $person;
        }

        $tasks = $taskQuery->orderBy('position')->paginate(2);

//        $tasks = $taskQuery->orderBy('created_at')->all();
//        $tasks->appends(['sort' => 'votes']);

        return View::make('tasks.index')
            ->with('tasks', $tasks)
            ->with('task', $task);
    }

    /**
     * Show the form for creating a new task.
     *
     * @return Renderable
     */
    public function create(): Renderable
    {
        return View::make('tasks.create');
    }

    /**
     * Store a newly created task in storage.
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
//            'name' => 'required',
//            'password' => 'required|min:8',
//            'email' => 'required|email|unique'
            'title'                 => '',
            'body'                  => '',
            'priority'              => '',
            'status_id'             => '',
            'responsible_person_id' => '',
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
     * Display the specified task.
     *
     * @param  int  $id
     * @return Renderable
     */
    public function show($id): Renderable
    {
        $task = Task::find($id);

        return View::make('tasks.show')
            ->with('task', $task);
    }

    /**
     * Show the form for editing the specified task.
     *
     * @param  int  $id
     * @return Renderable
     */
    public function edit($id): Renderable
    {
        // get the nerd
        $task = Task::find($id);

        // show the edit form and pass the nerd
        return View::make('tasks.edit')
            ->with('task', $task);
    }

    /**
     * Update the specified task in storage.
     *
     * @param Request $request
     * @param string $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $rules = array(

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
     * Remove the specified task from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        Task::find($id)->delete();
        Session::flash('message', 'Successfully deleted the task!');
        return Redirect::to('tasks');
    }

    /**
     * @param Request $request
     * @param Task $task
     * @return Renderable
     */
    public function position(Request $request, Task $task): Renderable
    {
        $taskQuery = $task->newQuery();

        $tasks = $taskQuery->orderBy('position')->get();

        return View::make('tasks.position')
            ->with('tasks', $tasks)
            ->with('task', $task);
    }

}
