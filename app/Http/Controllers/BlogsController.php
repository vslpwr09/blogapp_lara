<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Backend\Blog;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$blog = new Blog();
		$blogs = $blog->getBlogs();
		
        return view('backend.blogs.blogs', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.blogs.create_blog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blog = new Blog();
		
		$res = $blog->validate($request->all());
		
		if($res->fails())
		{
			return redirect()->back()->with('errors', $res->errors());
		} else {
			$save = $blog->store($request);
			if($save){
				return redirect('/backend/blogs')->with('success', 'Blog saved successfully..');
			} else {
				return redirect()->back()->with('failed', 'Somethind went wrong, Please try again.');
			}
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = new Blog();
		
		$blog = $blog->find($id);
		
        return view('backend.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blog = new Blog();
		
		$res = $blog->validate($request->all());
		
		if($res->fails())
		{
			return redirect()->back()->with('errors', $res->errors());
		} else {
			$save = $blog->store($request, $id);
			if($save){
				return redirect('/backend/blogs')->with('success', 'Blog updated successfully..');
			} else {
				return redirect()->back()->with('failed', 'Somethind went wrong, Please try again.');
			}
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
