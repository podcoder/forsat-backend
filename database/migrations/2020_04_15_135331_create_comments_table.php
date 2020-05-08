<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('comment');
            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('created_by');
            $table->timestamps();
        });

        Schema::table('comments', function (Blueprint $table){
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('question_id')->references('id')->on('questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
