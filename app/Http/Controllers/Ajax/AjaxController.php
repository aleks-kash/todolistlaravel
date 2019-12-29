<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Entities\Task;
use Illuminate\Support\Facades\{Validator, View, Session, Redirect, Response};
//use Illuminate\Http\RedirectResponse as Response;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Request;
//use Illuminate\Support\Facades\Response;

class AjaxController extends Controller
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

    public function search(Request $request)
    {
//        $tasks = $taskQuery->orderBy('created_at')->all();
//        dd($request->old('status'));
//        if ($request->isMethod('post')) {
//            dd($_POST);
//            $request->get('priority');
//            $request->get('status');
//            $request->get('person');
//            $tasks->appends(['sort' => 'votes']);
//        }

//        return Response::json([
//            'status' => 'success',
//            $positions
//        ]);
        if ($positions = $request->post('positions')) {
            foreach ($positions as $key => $position) {
                $index = $position[0];
                $newPosition = $position[1];

                $task = Task::find($index);
                $task->position = $newPosition;
                $task->save();

//             redirect
//            Session::flash('message', 'Successfully updated nerd!');
//            return Response::json([
//                'status' => $index,
//                $newPosition
//            ]);
            }
        }


        return Response::json([
            'status' => 'success',
            $positions
        ]);
    }
}
