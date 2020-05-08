<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpportunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opportunities', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->unsignedTinyInteger('category_id');
            $table->unsignedSmallInteger('country_id');
            $table->timestamp('deadline');
            $table->string('organizer');
            $table->unsignedBigInteger('created_by');
            $table->timestamps();
        });
        Schema::table('opportunities', function (Blueprint $table){
           $table->foreign('category_id')->references('id')->on('categories');
           $table->foreign('country_id')->references('id')->on('countries');
           $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opportunities');
    }
}
