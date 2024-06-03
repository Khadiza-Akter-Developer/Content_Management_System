<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function home()
    {
        $latestBlogs = Blog::orderBy('created_at', 'desc')->take(5)->get();
        $blog = Blog::simplePaginate(1);

        return view('website.blog.index', compact('blog', 'latestBlogs'));
    }

    public function show(Blog $blog)
    {
        return view('website.blog.single', ['blog' => $blog]);
    }
}
