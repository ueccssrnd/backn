<?php
class ForumController extends BaseController{
	
	/*Helper Functions*/
	public function getAllForums(){
		$forums = Forum::all();
		return Response::json($forums);
	}

	public function getAllForumReplies(){
		DB::table('forums')
		->join('forum_replies','forums.id','=','forum_replies.forum_id')
		->join('categories','forums.category_id','=','category_id')
		->select('forums_replies.reply','categories.category_name','forums.id','forums.thread_title');
	}
}