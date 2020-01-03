<?php

namespace App\Models\Entities;

use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Database\Eloquent\{Builder, Model, SoftDeletes};

class Task extends Model
{
    use FormAccessible, SoftDeletes;
    /**
     * Whether the model should throw a ValidationException if it
     * fails validation. If not set, it will default to false.
     *
     * @var boolean
     */
    protected $throwValidationExceptions = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'body',
        'priority',
        'responsible_person_id',
        'status_id',
    ];

    public function scopeByPriority(Builder $query, $priority): Builder
    {
        return $query->where('priority', '=', $priority);
    }

    public function scopeByStatus(Builder $query, $status): Builder
    {
        return $query->where('status_id', '=', $status);
    }

    public function scopeByPerson(Builder $query, $person): Builder
    {
        return $query->where('responsible_person_id', '=', $person);
    }
}
