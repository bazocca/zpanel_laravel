<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserlevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_levels', function (Blueprint $table) {
			$table->engine = 'MyISAM';
            $table->increments('id');
			$table->string('level_name', 30);
			$table->tinyInteger('status');
			$table->integer('id_created');
			$table->integer('id_modified');
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
        Schema::drop('user_levels');
    }
}
