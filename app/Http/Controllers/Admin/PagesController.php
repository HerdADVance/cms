<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidatePage;

use Auth;
use App\Page;

class PagesController extends Controller
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
            $pages = Page::defaultOrder()->withDepth()->get();
        } else{
            $pages = Auth::user()->pages()->get();
        }

        return view('admin.pages.index', ['pages' => $pages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create')->with([
            'model' => new Page(),
            'orderPages' => Page::defaultOrder()->withDepth()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidatePage $request)
    {

        $page = new Page($request->only([
            'title', 
            'url', 
            'content'
        ]));

        Auth::user()->pages()->save($page);

        $this->updatePageOrder($page, $request);

        return redirect()->route('pages.index')->with('status', 'The page has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        if(Auth::user()->cant('update', $page)){
            return redirect()->route('pages.index');
        }

        return view('admin.pages.edit', [
            'model' => $page,
            'orderPages' => Page::defaultOrder()->withDepth()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(ValidatePage $request, Page $page)
    {
        if(Auth::user()->cant('update', $page)){
            return redirect()->route('pages.index');
        }

        if($response = $this->updatePageOrder($page, $request)){
            return $response;
        }

        $page->fill($request->only(['title', 'url', 'content']));
        $page->save();

        return redirect()->route('pages.index')->with('status', 'The page was updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        if(Auth::user()->cant('delete', $page)){
            return redirect()->route('pages.index');
        }
    }

    protected function updatePageOrder(Page $page, Request $request){
        if($request->has('order', 'orderPage')){

            if($page->id == $request->orderPage){
                return redirect()->route('pages.edit', ['page' => $page->id])
                    ->withInput()->withErrors(['error' => 'Cannot order page against itself.']);
            }

            $page->updateOrder($request->order, $request->orderPage);
        }
    }
}
