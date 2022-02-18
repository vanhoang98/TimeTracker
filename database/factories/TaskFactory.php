<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Task::class, function (Faker $faker, $params) {
    $tasks = array('調査','定義','設計','開発','検証','リリース');
    $leaders = array('Hai Anh', 'Tue Anh', 'Hoang');
    $start = $faker->dateTimeBetween('next Monday', 'next Monday +7 days');
    $end = $faker->dateTimeBetween($start, $start->format('Y-m-d H:i:s').' +2 days');
    return [
        'project_id' => $params['project_id'],
        'parent_task_id' => $params['parent_task_id'],
        'name' => $tasks[array_rand($tasks)],
        'number_item' => $faker->ean8,
        'status' => 1,
        'leader' => $leaders[array_rand($leaders)],
        'start_date' => $start,
        'finish_date' => $end,
        'work_in_time' => 2,
        'actual_work_in_time' => 0,
        'progress' => 0,
        'description' => "",
    ];
});
