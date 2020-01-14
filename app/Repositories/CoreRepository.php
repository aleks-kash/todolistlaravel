<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 13.01.2020
 * Time: 13:21
 */

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CoreRepository
 *
 * @package App\Repositories
 *
 * Repository for working with an entity
 * Can produce datasets
 * Cannot create / modify entities
 */
abstract class CoreRepository
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * CoreRepository constructor.
     */
    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    /**
     * @return string
     */
    abstract protected function getModelClass();

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function startConditions()
    {
        $model = clone $this->model;

        return $model->newQuery();
    }

}
