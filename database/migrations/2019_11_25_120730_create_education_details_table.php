<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid');
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('name_privacy')->default(11111);
            $table->string('degree')->nullable();
            $table->string('degree_privacy')->default(11111);
            $table->string('field_of_study')->nullable();
            $table->string('description',1000)->nullable();
            $table->string('sports_and_activities',1000)->nullable();
            $table->year('start_year')->nullable();
            $table->year('end_year')->nullable();
            $table->string('row_privacy')->default(11111);
            $table->unsignedBigInteger('created_by');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('education_details');
    }
}
