<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class AboutController extends Controller
{
    public function index()
    {
        $about = About::simplePaginate(5);
        return view('about.index', compact('about'));
    }

    public function create()
    {
        return view('about.create');

    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'image'=>'required',
            'description'=> 'required'
        ]);

        $about = new About();
        $about->title = $request['title'];

        if($request->hasFile(['image']))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'. $extention;
            $file->move('uploads/abouts/',$filename);
            $about->image=$filename;
        }
        $about->description = $request['description'];

        $about->save();
        return redirect(route('about'))->with('status', 'About has added successfully');
    }

    public function edit($id)
    {
        $about = About::find($id);
        return view('about.edit', compact('about'));
    }

    public function update(Request $request, $id)
  
    {        
        $about = About::find($id);
        $about->title = $request['title'];
        if($request->hasFile(['image']))
        {
            $destination = 'uploads/abouts/'.$about->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'. $extention;
            $file->move('uploads/abouts/',$filename);
            $about->image=$filename;
        }
        $about->description = $request['description'];

        $about->update();
        return redirect(route('about'))->with('status', 'About has update successfully');

    }

    public function delete($id)
    {
        $about = About::find($id);
        $destination = 'uploads/abouts/'.$about->image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $about->delete();
        return redirect()->back()->with('status', 'About has been deleted successfully');

    }
}

