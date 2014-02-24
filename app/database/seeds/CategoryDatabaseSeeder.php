<?php
class CategoryDatabaseSeeder extends Seeder {

    public function run()
    {
        DB::table('categories')->delete();
        Category::create(array('category_name'=>'Lifestyle'));
        Category::create(array('category_name'=>'Fashion'));
        Category::create(array('category_name'=>'Relationships'));
        Category::create(array('category_name'=>'Anything Under the Sun'));
    }

}