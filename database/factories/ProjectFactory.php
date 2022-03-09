<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;


$factory->define(\App\Models\Project::class, function (Faker $faker) {
    $start = $faker->dateTimeBetween('next Monday', 'next Monday +7 days');
    $end = $faker->dateTimeBetween($start, $start->format('Y-m-d H:i:s').' +2 days');
    $manager = array('Hai Anh', 'Tue Anh', 'Hoang');
    return [
        'code' => $faker->unique()->ean8,
        'name' => 'TSUTAYA Project Sample',
        'manager' => $manager[array_rand($manager)],
        'organization' => $faker->company,
        'start_date' => $start,
        'finish_date' => $end,
        'status' => 1,
    ];
});
