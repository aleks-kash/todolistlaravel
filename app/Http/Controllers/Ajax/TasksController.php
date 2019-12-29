<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;

class TasksController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'only.ajax']);
    }

    public function search()
    {
        //        $tasks = $taskQuery->orderBy('created_at')->all();
//dd($request->old('status'));
//        if ($request->isMethod('post')) {
//            dd($_POST);
//            $request->get('priority');
//            $request->get('status');
//            $request->get('person');
//            $tasks->appends(['sort' => 'votes']);
//        }
        return Response::json(Request::all());
    }
}
