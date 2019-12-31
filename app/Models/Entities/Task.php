<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\{Builder, Model, SoftDeletes};

class Task extends Model
{
    use SoftDeletes;

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
