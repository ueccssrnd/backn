<?php

use Illuminate\Database\Migrations\Migration;

class StatusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('status',function($table){
			$table->increments('id');
			$table->string('status');
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
		Schema::dropIfExists('status');
	}

}