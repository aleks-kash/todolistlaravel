<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Illuminate\Support\Str;
use App\Models\Entities\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    $title = $faker->sentence(rand(3, 8), true);
    $body = $faker->realText(rand(1000, 2000));
    //$truncated = Str::limit($body, 20, ' (...)');
    return [
        'responsible_person_id' => rand(1, 3),
        'status_id'             => rand(1, 2),
        'priority'              => rand(1, 5),
        'slug'                  => Str::slug($title),
        'title'                 => $title,
        'body'                  => $body,
    ];
});
