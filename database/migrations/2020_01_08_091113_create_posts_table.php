<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid');
            $table->unsignedBigInteger('fromable_id');
            $table->string('fromable_type');
            $table->unsignedBigInteger('toable_id');
            $table->string('toable_type');
            $table->unsignedBigInteger('created_by');
            $table->string('content',1000)->nullable();
            $table->softDeletes();
            $table->tinyInteger('visibility')->default(0);
            $table->boolean('isHidden')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
