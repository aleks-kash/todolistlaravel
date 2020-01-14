<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 13.01.2020
 * Time: 13:32
 */

namespace App\Repositories;

use App\Http\Requests\TasksFilterRequest;
use App\Models\Entities\Task as Model;
use Illuminate\Http\Request;

/**
 * Class TasksFilterRepository
 *
 * @package App\Repositories
 */
class TasksRepository extends CoreRepository
{

    /**
     * Get filtered tasks
     *
     * @param Request $request
     */
    public function getForFilter(TasksFilterRequest $request)
    {
        $columns = [
            'id',
            'title',
            'slug',
            'body',
            'priority',
            'responsible_person_id',
            'status_id',
            'updated_at',
        ];

        $filterColumns = [
            'priority',
            'status',
            'person',
            'positionOrder',
        ];

        $query = $this->startConditions();

        foreach ($filterColumns as $columnName) {
            if (!$columnData = $request->get($columnName)) {
                continue;
            }

            $query->${'by' . ucfirst($columnName)}($columnData);
        }

        if (!$request->get('position')) {
            $query->orderBy('position');
        }

//dd([
//    $query->with(['status', 'responsiblePerson:id,name'])
//        ->paginate($request->get('perPage'), $columns)[0]
//        ->status->name
//
//]);


        return $query->with(['status', 'responsiblePerson:id,name'])
            ->paginate($request->get('perPage'), $columns)
        ;
    }

    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

}
