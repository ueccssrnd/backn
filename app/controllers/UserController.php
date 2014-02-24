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
			//unsuccessful.
			return Response::json(array("status" => -1, "message" => 'Error in signing up'));
		}
	}
	public function login(){
		Session::flush();
		$username = Input::get('username');
		$password = Input::get('password'); 
		if(Auth::attempt(array('username' => $username, 'password' => Hash::make($password)))){
			return Response::json(array('status'=>1, "message" => "Welcome to WOM-N"));
		}else{
			return Response::json(array('status'=>-1, "message" => "Invalid Login Credentials"));
		}
	}
	public function saveSession(){
		Session::flush();
		$userInformation = new UserInformation();
		$userInformation->first_name = Input::get('first_name');
		$userInformation->last_name = Input::get('last_name');
		$userInformation->birthdate = Date(Input::get('birthdate'));
		$userInformation->address = Input::get('address');	
		$userInformation->gender = Input::get('gender');
		$userInformation->civil_status = Input::get('civil_status');
		Session::put('prospect_user',serialize($userInformation));
		return Response::json(array('status' => 1));
	}
	public function register(){
		if($this->isUserExisting()){
			return Response::json(array('status' => -1, 'message'=> "Username already exists"));
		}else{
			$userInformation = unserialize(Session::get('prospect_user'));
			$user = new User();
			$user->username = Input::get('username');
			$user->password = Hash::make(Input::get('password'));
			$user->email = Input::get('email');
			$user->role =  1;
			//save user,
			$user->save();
			//retrieving id for use of user information
			$user = $this->findByUsername($user->username);
			$userInformation->user_id = $user->id;
			//save user information
			$userInformation->save();
			Session::flush();
			return Response::json(array('status' => 1, 'message'=> "Registration Successful"));
		}
	}
	/*Helper Functions*/
	protected function findByUsername($username){
		$user = DB::table('users')->where('username',$username)->first();
		return $user;
	}
	protected function isUserExisting(){
		$username = Input::get('username');
		$count = DB::table('users')->where('username',$username)->count();
		if($count == 0){
			return false;
		}else{
			return true;
		}
	}
	public static function showProfile(){
		$id = Input::get('id');
		$user = User::find($id);
		return Response::json($user);
	}
	public static function getAllUsers(){
		$users = User::all();
		return Response::json($users);
	}
	public static function prepareUser($user){
		$user->username = Input::get('username');
		$user->password = Hash::make(Input::get('password'));
		$user->email = Input::get('email');
		$user->civil_status = Input::get('civil_status');
		$user->birthdate = Input::get('birthdate');
		$user->gender = Input::get('gender');
		$user->address = Input::get('address');
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