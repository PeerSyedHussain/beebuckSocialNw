<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid');
            $table->string('salutation')->nullable();
            $table->string('f_name')->nullable();
            $table->string('l_name')->nullable();
            $table->string('nick_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('phone')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('email')->unique();
            $table->string('user_name')->unique()->nullable();
            $table->date('dob')->nullable();
            $table->string('address')->nullable();
            $table->string('bio',1000)->nullable();
            $table->string('website')->nullable();
            $table->string('location')->nullable();
            $table->tinyInteger('profile_complete')-> nullable();
            $table->unsignedBigInteger('profile_pic_id')->nullable();
            $table->unsignedBigInteger('banner_pic_id')->nullable();
            $table->unsignedBigInteger('current_company')->nullable();
            $table->string('temp_password')->nullable();
            $table->string('nick_name_privacy')->default(11111);
            $table->string('dob_privacy')->default(11111);
            $table->string('user_name_privacy')->default(11111);
            $table->string('email_privacy')->default(11111);
            $table->string('phone_privacy')->default(11111);
            $table->string('address_privacy')->default(11111);
            $table->string('bio_privacy')->default(11111);
            $table->string('gender_privacy')->default(11111);
            $table->string('marital_status_privacy')->default(11111);
            $table->string('designation_privacy')->default(11111);
            $table->string('website_privacy')->default(11111);
            $table->string('location_privacy')->default(11111);
            $table->string('education_privacy')->default(11111);
            /*
             *  0 - Inactive
             *  1 - Active
             *  2 - Disabled
             * */
            $table->tinyInteger('account_status')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->dateTime('last_active')->nullable();
            $table->string('last_active_privacy')->default(11111);
            $table->unsignedBigInteger('created_by');
            $table->softDeletes();
            $table->timestamps();

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
        Schema::dropIfExists('users');
    }
}
