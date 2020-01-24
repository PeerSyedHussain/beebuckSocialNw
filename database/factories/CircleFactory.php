<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Domains\Circles\Models\Circle::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'title' => $faker->company,
        'sub_title' => $faker->word(6),
        'description' => $faker->sentence,
        'category' => $faker->word(6),
        'website' => $faker->url,
        'phone' => $faker->unique()->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'address' => $faker->address,
        'status' => $faker->boolean,
        'profile_pic_id' => $faker->randomDigit,
        'cover_pic_id' => $faker->randomDigit,
        'slug' => $faker->slug,
        'page_id' => function () {
            return factory(\App\Domains\Pages\Models\Page::class)->create()->id;
        },
        'created_by' => function() {
            return factory(\App\Domains\Users\Models\User::class)->create()->id;
        }
    ];
});
