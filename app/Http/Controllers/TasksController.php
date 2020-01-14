<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Validation\ValidationException;
use App\Repositories\TasksRepository;
use App\Http\Requests\{TaskCreateRequest, TasksFilterRequest, TaskUpdateRequest, TasksUpdateRequest};
use App\Models\Entities\{
    User,
    Task,
    Status
};
use Collective\Html\{
    FormBuilder,
    FormFacade,
};
use Illuminate\Http\{
    Request,
    RedirectResponse,
};
use Illuminate\Support\Facades\{
    Url,
    View,
    Session,
    Redirect,
    Validator,
};

class TasksController extends BaseController
{

    /**
     * Display a listing of the tasks.
     *
     * @return Renderable
     */
    public function index(TasksFilterRequest $request, Task $task, TasksRepository $tasksRepository): Renderable
    {
        $rowStart = 0;
        if (($page = $request->get('page')) > 1) {
            $rowStart = ($page - 1) * ($request->get('perPage') ?? $task->getPerPage());
        }

        return View::make('tasks.index')
            ->with('tasks', $tasksRepository->getForFilter($request))
            ->with('taskModel', $task)
            ->with('rowStart', $rowStart)
        ;
    }

    /**
     * Show the form for creating a new task.
     *
     * @return Renderable
     */
    public function create(): Renderable
    {
        $statuses = Status::all()->pluck('name', 'id')->put(0, '---')->sortKeys();
        $users = User::all()->pluck('name', 'id')->put(0, '---')->sortKeys();

        return View::make('tasks.create')
            ->with('statuses', $statuses)
            ->with('users', $users)
        ;
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
        $statuses = Status::all()->pluck('name', 'id')->put(0, '---')->sortKeys();
        $users = User::all()->pluck('name', 'id')->put(0, '---')->sortKeys();

        return View::make('tasks.edit')
            ->with('statuses', $statuses)
            ->with('users', $users)
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

        return Redirect::to(URL::route('tasks.edit', [$task->id]));
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
