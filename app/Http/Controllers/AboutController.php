<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::cursorPaginate(5);
        return view('about.index', compact('about'));
    }

    public function store(Request $request)
    {
        $about = new About();
        $about->title = $request['title'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/abouts/', $filename);
            $about->image = $filename;
        }
        $about->description = $request['description'];
        $about->save();

        return response()->json(['status' => 'success', 'message' => 'About added successfully']);
    }

    public function edit(Request $request)
    {
        $about = About::find($request->id);
        return response()->json($about);
    }

    public function update(Request $request)
    {
        $about = About::find($request->id);
        $about->title = $request['title'];

        if ($request->hasFile('image')) {
            $destination = 'uploads/abouts/' . $about->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/abouts/', $filename);
            $about->image = $filename;
        }
        $about->description = $request['description'];
        $about->save();

        return response()->json(['status' => 'success', 'message' => 'About updated successfully']);
    }

    public function delete(Request $request)
    {
        $about = About::find($request->id);
        $destination = 'uploads/abouts/' . $about->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $about->delete();

        return response()->json(['status' => 'success', 'message' => 'About deleted successfully']);
    }
}
