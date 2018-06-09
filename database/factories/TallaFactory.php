<?php

use Faker\Generator as Faker;

$factory->define(App\Talla::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElements(['20-30' , '30-40' , '40-50' , '50-60' , '60-70' , '70-80' , '80-100' , '100-120']),
        'peso' => $faker->randomElements(['29/30/31/32' , '25/26/27/28' , '20/21/22/23/24' , '17/18/19', '15/16' , '13/14' , '10/11/12' , '8/9'])
    ];
});
