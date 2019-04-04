<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::find(1);

        Post::truncate();

        $admin->pages()->saveMany([
        	
        	new Post([
        		'title' => 'Post 1',
        		'slug' => 'post-1',
        		'excerpt' => '#1',
        		'content' => 'This is post 1',
        	]),

        	new Post([
        		'title' => 'Post 2',
        		'slug' => 'post-2',
        		'excerpt' => '#2',
        		'content' => 'This is post 2',
        	]),

        	new Post([
        		'title' => 'Post 3',
        		'slug' => 'post-3',
        		'excerpt' => '#3',
        		'content' => 'This is post 3',
        	]),

        ]);
    }
}
