<?php

namespace App\Http\Controllers\Ajax;

use App\Models\Entities\Task;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class AjaxController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct(['verified', 'only.ajax']);
    }

    public function search(Request $request)
    {
        if ($positions = $request->post('positions')) {
            foreach ($positions as $key => $position) {
                $index = $position[0];
                $newPosition = $position[1];

                $task = Task::find($index);
                $task->position = $newPosition;
                $task->save();
            }
        }

        return Response::json([
            'status' => 'success',
            $positions
        ]);
    }
}
