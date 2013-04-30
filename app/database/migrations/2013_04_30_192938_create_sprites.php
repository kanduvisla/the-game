<?php

use Illuminate\Database\Migrations\Migration;

class CreateSprites extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('sprites', function($table){
            $table->increments('id');
            $table->integer('version');
            $table->string('name', 32);
            $table->boolean('walkable');
            $table->binary('image');
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
		//
        Schema::drop('sprites');
	}

}