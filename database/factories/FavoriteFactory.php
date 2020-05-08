<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Models\Favorite;
use App\Models\Opportunity;
use App\User;
use Faker\Generator as Faker;

$factory->define(Favorite::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'opportunity_id' => Opportunity::all()->random()->id
    ];
});
