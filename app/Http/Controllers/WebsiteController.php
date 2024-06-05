<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Slider;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function home()
    {
        //$latestBlogs = Blog::orderBy('created_at', 'desc')->take(5)->get();

        $blog = Blog::all();
        $slider = Slider::all();

        return view('website.blog.index', compact('blog', 'slider'));
    }

    public function show(Blog $blog)
    {
        return view('website.blog.single', ['blog' => $blog]);
    }
}
