<?php


namespace App\Http\Controllers;

use App\Models\Blog; 
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function home()
    {
        $blog = Blog::simplePaginate(1);
        
        return view('website.blog.index', compact('blog'));
    }

    public function show(Blog $blog)
    {
        return view('website.blog.single', ['blog'=>$blog]);
    }
}

