<?php
class UserDatabaseSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();
        User::create(array('username' => 'jmidol','password' => 'password', 'role' => 1, 'login_status' => 0, 'email' => 'jmramos@creativejose.com'));
        User::create(array('username' => 'namnam','password' => 'password', 'role' => 1, 'login_status' => 0, 'email' => 'jinver@nam.com'));
        User::create(array('username' => 'magzz','password' => 'password', 'role' => 1, 'login_status' => 0, 'email' => 'magzzs@hoho.com'));
    	User::create(array('username' => 'patrick','password' => 'password', 'role' => 1, 'login_status' => 0, 'email' => 'patrick@lim.com'));
    }

}