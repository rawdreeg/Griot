<?php

use Faker\Generator as Faker;
use App\Model\Discussion;
use App\User;

$factory->define(App\Model\Reply::class, function (Faker $faker) {
    return [
        'body' => $faker->text,
        'discussion_id' => function(){
            return Discussion::all()->random();
        },
        'user_id' => function(){
            return User::all()->random();
        }
    ];
});
