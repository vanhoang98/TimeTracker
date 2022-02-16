<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Employee::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        'role_id' => 1,
        'date_of_birth' => $faker->dateTime,
        'sex' => 1,
        'address' => $faker->address,
        'department' => "TSUTAYA IT",
        'breaktime_start' => $faker->dateTime,
        'breaktime_finish' => $faker->dateTime
    ];
});
