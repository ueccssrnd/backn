<?php

use Illuminate\Database\Migrations\Migration;

class UsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * Roles: 1 = normal user, 2 = moderator, 3 = administrator
	 * Status: 1 = actived, 0 = deactivated 
	 * Gender" 1 = male, 2 = female
	 * Civil status: 1 = single, 2 = married, 3 = divorce, 4 = seperated, 5 = widowed
	 * @return void
	 */
	public function up()
	{
		Schema::create('users',function($table){
			$table->increments('id');
			$table->string('username');
			$table->string('password');
			$table->smallInteger('role');
			$table->smallInteger('login_status');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('users');
	}
}