<?php
class ForumController extends BaseController{
	
	/*Helper Functions*/
	public function getAllForums(){
		$forums = Forum::all();
		return Response::json($forums);
	}

	public function getAllForumReplies($id){
		$result = DB::table('forums')
		->join('forum_replies','forums.id','=','forum_replies.forum_id')
		->select('forum_replies.reply','forums.id','forums.thread_title')
		->where('forums.id' , '=' , $id)
		->get();
		return Response::json($result);
	}
}