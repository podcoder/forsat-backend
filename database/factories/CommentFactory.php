<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
//    $table->string('comment');
//    $table->unsignedBigInteger('question_id');
//    $table->unsignedBigInteger('created_by');
    return [
        'comment' => $faker->text(255),
        'question_id' => \App\Models\Question::all()->random()->id,
        'created_by' => \App\User::all()->random()->id
    ];
});
