<?php
class UserController extends BaseController{

	public function createAccount(){
		$user = new User;
		$user = prepareUser($user);
		//save the instance.
		$user->save();
		//return stupid.
		return Response::json(array("message" => 1));

	}
	public function modifyAccount(){
		$id = Input::get('id');
		$user = User::find($id);
		$user = prepareUser($user);
		$user = User::find($id);
		$user->status = 0;
		$user->save();
		return Response::json(array("message" => 1));
	}
	public function deleteAccount(){
		$id = Input::get('id');
		$user = User::find('id');
		$user->delete();
	}
	public function showProfile(){
		$id = Input::get('id');
		$user = User::find($id);
		return Response::json($user);
	}
	public function getAllUsers(){
		$users = User::all();
		return Response::json($users);
	}
	public function prepareUser($user){
		$user->username = Input::get('username');
		$user->password = Hash::make(Input::get('password'));
		$user->email = Input::get('email');
		$user->civil_status = Input::get('civil_status');
		$user->gender = Input::get('gender');
		$user->first_name = Input::get('first_name');
		$user->last_name = Input::get('last_name');
		$user->role = Input::get('role');
		$user->status = 1;
	}
}