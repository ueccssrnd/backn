<?php
class UserController extends BaseController{

	public function createAccount(){
		//check if there is existing record
		$count = User::where('username','=',Input::get('username'))->count();
		if($count == 0){
			$user = new User;
			$user = $this->prepareUser($user);
			//save the instance.
			$user->save();	
			//successful.
			return Response::json(array("status" => 1, "message" => 'User Successfuly Added'));
		}else{
			//unsuccessful
			return Response::json(array("status" => -1, "message" => 'Error in signing up'));
		}
	}
	public function modifyAccount(){
		$id = Input::get('id');
		$user = User::find($id);
		$user = prepareUser($user);
		$user = User::find($id);
		$user->status = 0;
		$user->save();
		return Response::json(array('status' => 1,"message" => "Account Successfuly Modified"));
	}
	public function deleteAccount(){
		$id = Input::get('id');
		$user = User::find('id');
		$user->delete();
		return Response::json(array('status' => 1,"message" => "Account Successfuly Deleted"));
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
		$user->birthdate = Input::get('birthdate');
		$user->gender = Input::get('gender');
		$user->first_name = Input::get('first_name');
		$user->last_name = Input::get('last_name');
		$user->role = Input::get('role');
		$user->status = 1;
		return $user;
	}
}