<?php


namespace App\Http\Controllers;

use App\Models\Blog; 
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function home()
    {
        $blogs = Blog::all();
        
        return view('website.blog.index', compact('blogs'));
    }
}

