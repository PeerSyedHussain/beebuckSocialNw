<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Domains\Users\Models\CompanyDetail;
use Faker\Generator as Faker;

$factory->define(CompanyDetail::class, function (Faker $faker) {
    $employment_types = ['Full Time', 'Part Time', 'Work From Home', 'Remote'];
    return [
        'uuid' => $faker->uuid,
        'user_id' => function(){
            return factory(\App\Domains\Users\Models\User::class)->create()->id;
        },
        'name' => $faker->company,
        'employment_type' => $employment_types[array_rand($employment_types)],
        'location' => $faker->city,
        'job_title' => $faker->jobTitle,
        'job_description' => $faker->paragraph,
        'start_year' => $faker->year,
        'end_year' => $faker->year,
        'created_by' => 1,
    ];
});
