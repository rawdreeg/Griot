<?php

use Faker\Generator as Faker;
use App\User;
use App\Model\Hut;

$factory->define(App\Model\Discussion::class, function (Faker $faker) {
    $title = $faker->sentence;
    return [
        'title' => $title,
        'slug' => str_slug($title),
        'body' => $faker->text,
        'hut_id' => function(){
            return Hut::all()->random();
        },
        'user_id' => function(){
            return User::all()->random();
        }
    ];
});
