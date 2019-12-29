<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public const IN_PROGRESS = 1;
    public const DONE = 2;
}
