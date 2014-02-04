<?php
class MessageController extends BaseController{
	public function send(){
		$sender = Input::get('sender');
		$reciever = Input::get('reciever');
		$content_message = Input::get('message');

		$sender_id = User::where('username', '=', $sender);
		$reciever_id = User::where('reciever', '=', $receiver);

		$message = new Message();
		$message->sender_id = $sender_id;
		$message->receiver_id = $reciever_id;
		$message->message = $content_message;
		$message->save();
		return Response::json(array("message"=>1));
	}

	public function viewInbox(){
		$id = Auth::user()->id;
		$messages = Input::where('reciever_id')->get();
		return Response::json($messages);
	}

	public function viewSentMessages(){
		$id = Auth::user()->id;
		$messages = Input::where('sender_id')->get();
		return Response::json($messages);
	}

	public function delete(){
		$id = Input::get('id');
		$message = Message::find($id);
		$message->delete();
		return Response::json(array("message"=>1));
	}
}