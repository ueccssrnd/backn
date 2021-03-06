<?php

use Illuminate\Database\Migrations\Migration;

class UserInformationTable extends Migration {

	/**
	 * Run the migrations.
	 * 1 = single
	 * 2 = married
	 * 3 = widowed
	 * 4 = annulled
	 * 5 = divorced
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_information',function($table){
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('first_name');
			$table->string('last_name');
			$table->string('address');
			$table->string('picture_file');
			$table->date('birthdate');
			$table->string('contact_number');
			$table->smallInteger('gender');
			$table->integer('civil_status');
			$table->timestamps();
			$table->softDeletes();

			//constraints
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
		Schema::dropIfExists('user_information');
	}

}