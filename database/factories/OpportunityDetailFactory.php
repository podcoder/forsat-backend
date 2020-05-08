<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\OpportunityDetail;
use Faker\Generator as Faker;

$factory->define(OpportunityDetail::class, function (Faker $faker) {


    return [
        'benefits' => $faker->text(600),
        'application_process' => $faker->text(400),
        'further_queries' => $faker->text(400),
        'eligibilities' => $faker->text(500),
        'start_date' => $faker->dateTime(),
        'end_date' => $faker->dateTime(),
        'official_link' => $faker->url
    ];
});
