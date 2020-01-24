<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Domains\Users\Models\Link;
use App\Domains\Users\Models\User;
use Faker\Generator as Faker;

$factory->define(Link::class, function (Faker $faker) {
    $type = ['email','password','fb','linkedin','twitter'];
    return [
        'uuid' => $faker->uuid,
        'user_id' => function(){
            return factory(User::class)->create()->id;
        },
        'type' => $type[array_rand($type)],
        'value' => $faker->freeEmailDomain,
        'created_by' => 1,
    ];
});
