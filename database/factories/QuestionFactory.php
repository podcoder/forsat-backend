<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    //        $table->string('question');
//    $table->unsignedBigInteger('created_by');
    return [

        'question' => $faker->text(255),
        'created_by' => \App\User::all()->random()->id
    ];
});
