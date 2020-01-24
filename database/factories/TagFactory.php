<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Domains\Users\Models\Tag;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'name' => $faker->unique()->domainWord,
        'created_by' => 1,
    ];
});
