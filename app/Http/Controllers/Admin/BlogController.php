<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;

use Auth;
use App\Post;

class BlogController extends Controller
{
    
    public function __construct(){
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->isAdmin()){
            $posts = Post::all();
        } else{
            $posts = Auth::user()->posts()->get();
        }

        return view('admin.blog.index', ['model' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.blog.create', ['model' => new Post()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {
        Auth::user()->posts()->save(
            new Post($request->only(['title', 'slug', 'content', 'excerpt', 'published_at']))
        );

        return redirect()->route('blog.index')->with('status', 'The post has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $blog)
    {
        return view('admin.blog.edit')->with('model', $blog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, Post $blog)
    {
        if(Auth::user()->cant('update', $blog)){
            return redirect()->route('blog.index')->with('status', 'You do not have persmission to edit that.');
        }

        $blog->fill($request->only(['title', 'slug', 'published_at', 'content', 'excerpt']));
        $blog->save();

        return redirect()->route('blog.index')->with('status', 'The post was edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $blog)
    {
        if(Auth::user()->cant('delete', $blog)){
            return redirect()->route('blog.index')->with('status', 'You dont have persmission to delete that.');
        }

        $blog->delete();

        return redirect()->route('blog.index')->with('status', 'The post was deleted.');
    }
}
