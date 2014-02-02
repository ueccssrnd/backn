<?php
class UserController extends BaseController{

	public function createAccount(){
		$user = new User;
		$user->username = Input::get('username');
		$user->password = Hash::make(Input::get('password'));
		$user->email = Input::get('email');
		$user->civil_status = Input::get('civil_status');
		$user->gender = Input::get('gender');
		$user->first_name = Input::get('first_name');
		$user->last_name = Input::get('last_name');
		$user->role = Input::get('role');
		$user->status = 1;
		//save the instance.
		$user->save();
		//return stupid.
		return Response::json(array("message" => 1));

	}

	public function modifyAccount(){

	}

	public function deactivateAccount(){

	}

	public function showProfile(){
		
	}
	public function getAllUsers(){
		$users = User::all();
		return Response::json($users);
	}
}