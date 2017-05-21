<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('user_name');
            $table->string('user_email')->unique();
            $table->string('password');
            $table->string('job');

            $table->string('user_photo')->nullable();
            // $table->date('date_of_birth');
            // $table->enum('gender', ['male', 'female']);
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ['male', 'female'])->default('female');
            $table->boolean('user_block')->default(true);
            // $table->boolean('block')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

