<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid');
            $table->string('title');
            $table->string('sub_title')->nullable();
            $table->string('description',1000)->nullable();
            $table->string('category')->nullable(); // page category ex: education or company
            $table->string('website')->nullable();
            $table->string('phone')->nullable()->unique();
            $table->string('email')->nullable()->unique();
            $table->string('address')->nullable();
            $table->boolean('status')->default(1);
            $table->unsignedBigInteger('profile_pic_id')->nullable();
            $table->unsignedBigInteger('cover_pic_id')->nullable();
            $table->string('circle_privacy')->default(11111);
            $table->string('slug')->nullable();
            $table->unsignedBigInteger('page_id');
            $table->unsignedBigInteger('circle_id');
            $table->unsignedBigInteger('created_by');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('page_id')->references('id')->on('pages');
            $table->foreign('circle_id')->references('id')->on('circles');
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
        Schema::dropIfExists('groups');
    }
}
