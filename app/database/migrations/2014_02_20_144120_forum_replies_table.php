<?php

use Illuminate\Database\Migrations\Migration;

class ForumRepliesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('forum_replies',function($table){
			$table->increments('id');
			$table->string('reply');
			$table->integer('user_id')->unsigned();
			$table->integer('forum_id')->unsigned();
			$table->timestamps();
			$table->softDeletes();
			//constraints
			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('forum_id')->references('id')->on('forums');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('forum_replies');
	}

}