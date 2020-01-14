<?php

namespace App\Models\Entities;

use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Database\Eloquent\{Builder, Model, Relations\BelongsTo, SoftDeletes};

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
     * The number of models to return for pagination.
     *
     * @var int
     */
    protected $perPage = 3;

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

    public function scopeByPositionOrder(Builder $query, $position): Builder
    {
        return $query->orderBy('position');
    }

    /**
     * Task status
     *
     * @return BelongsTo
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * Person responsible for the assignment
     *
     * @return BelongsTo
     */
    public function responsiblePerson(): BelongsTo
    {
        return $this->belongsTo(User::class, 'responsible_person_id');
    }
}