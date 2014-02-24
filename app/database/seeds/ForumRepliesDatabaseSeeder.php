<?php
class ForumRepliesDatabaseSeeder extends DatabaseSeeder{
	 public function run()
    {
        DB::table('forum_replies')->delete();;
    	ForumReply::create(array('reply' => 'Program for Love',
    						'user_id' => 1,
    						'forum_id'=> 1));
    }

}