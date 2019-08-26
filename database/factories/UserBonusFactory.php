<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\UserBonus;
use Faker\Generator as Faker;

$factory->define(UserBonus::class, function (Faker $faker) {
    return [
        'status' => 'available'
    ];
});
