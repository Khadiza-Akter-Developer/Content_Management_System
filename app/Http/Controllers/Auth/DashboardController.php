<?php

namespace App\Http\Controllers\Auth;

use App\Models\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $blogCount = Blog::count();
        return view('auth.dashboard',compact('blogCount'));
    }
}
