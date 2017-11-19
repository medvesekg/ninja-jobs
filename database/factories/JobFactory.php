<?php

use Faker\Generator as Faker;

$factory->define(\App\Job::class, function (Faker $faker) {
    return [
        'name' => $faker->jobTitle,
        'body' => $faker->paragraph,
        'skills' => $faker->words(3, true),
        'company_id' => rand(1,8),
        'category_id' => rand(1,5),
        'created_at' => $faker->dateTimeBetween('-1 year', 'now')
    ];
});
