<?php

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
			$table->engine = "MyISAM";
            $table->increments('id');
            $table->string('full_name', 200);
			$table->string('address', 200);
			$table->string('phone', 50);
			$table->string('username', 30)->unique();
            $table->string('email', 200)->unique();
            $table->string('password', 60);
			$table->tinyInteger('status');
			$table->integer('id_media_library');
			$table->integer('id_user_level');
			$table->integer('id_created');
			$table->integer('id_modified');
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
        Schema::drop('users');
    }
}
