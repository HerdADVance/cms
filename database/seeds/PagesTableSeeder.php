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
        	
    	
        $about = new Page([
    		'title' => 'About',
    		'url' => '/about',
    		'content' => 'About our Company.'
    	]);

        $faq = new Page([
            'title' => 'FAQ',
            'url' => '/faq',
            'content' => 'Frequently Asked Questions'
        ]);

    	$team = new Page([
    		'title' => 'Team',
    		'url' => '/team',
    		'content' => 'Our awesome staff.'
    	]);

    	$contact = new Page([
    		'title' => 'Contact',
    		'url' => '/contact',
    		'content' => 'Drop us a line.'
    	]);
        
        
        $admin->pages()->saveMany([
            $about, $team, $contact, $faq
        ]);

        // Making FAQ a child of About
        $about->appendNode($faq);
    }
}
