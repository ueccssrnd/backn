<?php
class ForumDatabaseSeeder extends DatabaseSeeder{
	 public function run()
    {
        DB::table('forums')->delete();
        Forum::create(array('author_id' => 1, 
        					'thread_title' => "What's the weirdest thing you did for love?",
        					'category_id' => 3));
        Forum::create(array('author_id' => 2,
        					'thread_title' => 'Perfect Spot for a Vacation?',
        					'category_id' => 4));
    }
	
}