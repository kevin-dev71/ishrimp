<?php

use Faker\Generator as Faker;

$factory->define(App\Metric::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElements(['ml' , 'L' , 'gal' , 'mg' , 'gr' , 'kg' , 'lb' , 'uniddad']),
        'valor' => $faker->randomElements(['0.001' , '1', '3.78', '1000', '453.592'])
    ];
});
