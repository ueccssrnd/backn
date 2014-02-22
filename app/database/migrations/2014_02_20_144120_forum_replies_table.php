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
			$table->timestamps();
			$table->softDeletes();
			//constraint
			$table->foreign('user_id')->references('id')->on('users');
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