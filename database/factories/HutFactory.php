<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Hut::class, function (Faker $faker) {
    $hut_name = $faker->word;
    return [
        'name' => $faker->word,
        'slug' => str_slug($hut_name)
    ];
});
