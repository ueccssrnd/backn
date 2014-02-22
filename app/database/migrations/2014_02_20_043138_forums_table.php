<?php

use Illuminate\Database\Migrations\Migration;

class ForumsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('forums',function($table){
			$table->increments('id');
			$table->integer('author_id')->unsigned();
			$table->string('thread_title');
			$table->integer('category_id')->unsigned();
			$table->timestamps();
			$table->softDeletes();
			//constraints
			$table->foreign('author_id')->references('id')->on('users');
			$table->foreign('category_id')->references('id')->on('categories');
		});	
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('forums');
	}

}