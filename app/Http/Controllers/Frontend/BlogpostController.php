<?php

namespace App\Http\Controllers\Frontend;

use App\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Carbon\Carbon;

class BlogpostController extends Controller
{
    public function index(){

    	$published = Post::with('user')
    		->where('published_at', '<', Carbon::now())
    		->orderBy('published_at', 'desc')
    		->paginate(10);
    		
    	return view('frontend.blog.index')->with('published', $published);
    }

    public function view($slug){

    	$post = Post::with('user')
    		->where([
    			['slug', '=', $slug],
    			['published_at', '<', Carbon::now()],
    		])
    		->firstOrFail();

    		
    	return view('frontend.blog.view')->with('post', $post);
    }
}
