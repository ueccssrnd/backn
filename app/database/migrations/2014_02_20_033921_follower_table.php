<?php

use Illuminate\Database\Migrations\Migration;

class FollowerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('followers',function($table){
			$table->increments('id');
			$table->integer('follower_id')->unsigned();
			$table->integer('following_id')->unsigned();
			$table->timestamps();
			$table->softDeletes();
			//constraints
			$table->foreign('follower_id')->references('id')->on('users');
			$table->foreign('following_id')->references('id')->on('users');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('followers');
	}

}