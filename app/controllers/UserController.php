<?php
class UserController extends BaseController{

	/*Controller Routes Function*/
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
	public function login(){
		$username = Input::get('username');
		$password = Input::get('password'); 
		if(Auth::attempt(array('username' => $username, 'password' => Hash::make($password)))){
			return Response::json(array('status'=>1, "message" => "Welcome to WOM-N"));
		}else{
			return Response::json(array('status'=>-1, "message" => "Invalid Login Credentials"));
		}
	}
	/*Helper Functions*/
	public function findByUsername(){
		$username = Input::get('username');
		$user = DB::table('users')->where('username',$username)->first();
		return $user;
	}
	public function isUserExisting(){
		$username = Input::get('username');
		$count = DB::table('users')->where('username',$username)->count();
		if($count == 0){
			return false;
		}else{
			return true;
		}
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
} 