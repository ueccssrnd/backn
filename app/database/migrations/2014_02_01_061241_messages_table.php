<?php

use Illuminate\Database\Migrations\Migration;

class MessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("messages",function($table){
			$table->increments('id');
			$table->integer('receiver_id')->unsigned();
			$table->integer('sender_id')->unsigned();
			$table->string('message');
			//constraints
			$table->foreign('receiver_id')->references('id')->on('users');
			$table->foreign('sender_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists("messages");
	}

}