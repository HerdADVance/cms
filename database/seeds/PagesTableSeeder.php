<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Page;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::find(1);

        Page::truncate();

        $admin->pages()->saveMany([
        	
        	new Page([
        		'title' => 'About',
        		'url' => '/about',
        		'content' => 'About our Company.'
        	]),

        	new Page([
        		'title' => 'Team',
        		'url' => '/team',
        		'content' => 'Our awesome staff.'
        	]),

        	new Page([
        		'title' => 'Contact',
        		'url' => '/contact',
        		'content' => 'Drop us a line.'
        	]),
        	
        ]);
    }
}
