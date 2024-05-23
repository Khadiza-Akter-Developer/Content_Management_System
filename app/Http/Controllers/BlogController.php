<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function index()
    {
        $blog = Blog::all();
        return view('blog.index', compact('blog'));
    }

    public function store(Request $request)
    {
        $blog = new Blog;
        $blog->title = $request['title'];

        if ($request->hasFile('image')) 
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/blogs/', $filename);
            $blog->image = $filename;
        }
        $blog->description = $request['description'];
        $blog->save();

        return response()->json(['status' => 'success', 'message' => 'Blog added successfully']);
    }

    public function edit(Request $request)
    {
        $blog = Blog::find($request->id);
        return response()->json($blog);
    }

    public function update(Request $request)
    {
        $blog = Blog::find($request->id);
        $blog->title = $request['title'];

        if ($request->hasFile('image')) {
            $destination = 'uploads/blogs/' . $blog->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/blogs/', $filename);
            $blog->image = $filename;
        }
        $blog->description = $request['description'];
        $blog->save();

        return response()->json(['status' => 'success', 'message' => 'Blog updated successfully']);
    }

    public function delete(Request $request)
    {
        $blog = Blog::find($request->id);
        $destination = 'uploads/blogs/' . $blog->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $blog->delete();

        return response()->json(['status' => 'success', 'message' => 'Blog deleted successfully']);
    }
}
