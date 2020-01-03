<?php

namespace App\Http\Controllers;
use App\Http\Requests\TaskUpdateRequest;
use App\Http\Requests\TaskCreateRequest;
use App\Http\Requests\TasksUpdateRequest;
use App\Models\Entities\{
    User,
    Task,
    Status
};
use Collective\Html\FormBuilder;
use Collective\Html\FormFacade;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Validator, View, Session, Redirect};
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Url;

class TasksController extends BaseController
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

        $tasks = $taskQuery->orderBy('position')->paginate(5);

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
     * @param TaskCreateRequest $request
     * @param Task $task
     * @return RedirectResponse
     */
    public function store(TaskCreateRequest $request, Task $task): RedirectResponse
    {
        Session::flash('message', 'Successfully created task!');
        $task = $task->create($request->all());

        return Redirect::to(URL::route('tasks.edit', [$task->id]));
    }

    /**
     * Display the specified task.
     *
     * @param Task $task
     * @return Renderable
     */
    public function show(Task $task): Renderable
    {
        return View::make('tasks.show')
            ->with('task', $task)
        ;
    }

    /**
     * Show the form for editing the specified task.
     *
     * @param Task $task
     * @return Renderable
     */
    public function edit(Task $task): Renderable
    {
        return View::make('tasks.edit')
            ->with('task', $task)
        ;
    }

    /**
     * Update the specified task in storage.
     *
     * @param TasksUpdateRequest $request
     * @param Task $task
     * @ return RedirectResponse
     */
    public function update(TaskUpdateRequest $request, Task $task)
    {
        Session::flash('message', 'Successfully updated task!');
        $result = $task->update($request->all());

        return Redirect::route('tasks.edit',[$task->id]);
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
