<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Backend\Blog;

class ShowBlogsController extends Controller
{
	/**
     * Show list of blogs
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
	{
		$blog = new Blog();
		$blogs = $blog->getBlogs(1);
		
		return view('show_blogs', compact('blogs'));
	}
	
	/**
     * Show single blog
     *
     * @return \Illuminate\Http\Response
     */
	public function readMore($id)
	{
		$blog = new Blog();
		$blog = $blog->find($id);
		
		return view('read_more', compact('blog'));
	}
}
