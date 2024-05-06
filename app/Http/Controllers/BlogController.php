<?php

namespace App\Http\Controllers;
use  App\Models\Blog;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function index()
    {
        $blog = Blog::cursorPaginate(5);
        return view('blog.index', compact('blog'));
    }

    public function create()
    {

        return view('blog.create');
        
    }

    public function store(Request $request)
    {
        $blog = new Blog;
        $blog->title = $request['title'];

        if($request->hasFile(['image']))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'. $extention;
            $file->move('uploads/blogs/',$filename);
            $blog->image=$filename;
        }
        $blog->description = $request['description'];

        $blog->save();
        return redirect(route('blog'))->with('status', 'Blog has added successfully');
    }

    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('blog.edit', compact('blog'));
    }

    public function update(Request $request, $id)
  
    {        
        $blog = Blog::find($id);
        $blog->title = $request['title'];
        if($request->hasFile(['image']))
        {
            $destination = 'uploads/blogs/'.$blog->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'. $extention;
            $file->move('uploads/blogs/',$filename);
            $blog->image=$filename;
        }
        $blog->description = $request['description'];

        $blog->update();
        return redirect(route('blog'))->with('status', 'Blog has update successfully');

    }

    public function delete($id)
    {
        $blog = Blog::find($id);
        $destination = 'uploads/blogs/'.$blog->image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $blog->delete();
        return redirect()->back()->with('status', 'blog has update successfully');

    }

}
