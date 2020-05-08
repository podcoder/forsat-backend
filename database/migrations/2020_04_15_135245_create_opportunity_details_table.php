<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpportunityDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('opportunity_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('opportunity_id');
            $table->mediumText('benefits');
            $table->mediumText('application_process');
            $table->mediumText('further_queries')->nullable();
            $table->mediumText('eligibilities');
            $table->timestamp('start_date');
            $table->timestamp('end_date');
            $table->string('official_link')->nullable();
            $table->json('eligible_regions')->nullable();
            $table->timestamps();
        });
        Schema::table('opportunity_details', function (Blueprint $table){
            $table->foreign('opportunity_id')
                ->references('id')
                ->on('opportunities')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opportunity_details');
    }
}
