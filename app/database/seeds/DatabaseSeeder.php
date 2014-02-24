<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		 $this->call('UserDatabaseSeeder');
		 $this->call('CategoryDatabaseSeeder');
		 $this->call('ForumDatabaseSeeder');
		 $this->call('ForumRepliesDatabaseSeeder');
	}

}