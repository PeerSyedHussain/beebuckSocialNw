<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Domains\Users\Models\EducationDetail;
use Faker\Generator as Faker;

$factory->define(EducationDetail::class, function (Faker $faker) {
    $degrees = ['B.tech', 'M.Tech', 'B.A', 'M.A', 'B.E','M.E'];
    $field = ['Computer Science Engg.', 'Electrical Engg.', 'Electronics Engg.', 'Chemical Engg.', 'Mathematics', 'Economics'];
    return [
        'uuid' => $faker->uuid,
        'user_id' => function(){
            return factory(\App\Domains\Users\Models\User::class)->create()->id;
        },
        'name' => $faker->company,
        'degree' => $degrees[array_rand($degrees)],
        'field_of_study' => $field[array_rand($field)],
        'description' => $faker->paragraph,
        'sports_and_activities' => $faker->paragraph,
        'start_year' => $faker->year,
        'end_year' => $faker->year,
        'created_by' => 1,
    ];
});
