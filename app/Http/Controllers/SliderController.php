<?php

namespace App\Http\Controllers;
use  App\Models\Slider;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index()
    {
        $slider = Slider::cursorPaginate(5);
        return view('slider.index', compact('slider'));
    }

    public function create()
    {

        return view('slider.create');
        
    }

    public function store(Request $request)
    {
        $slider = new Slider;
        $slider->title = $request['title'];

        if($request->hasFile(['image']))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'. $extention;
            $file->move('uploads/sliders/',$filename);
            $slider->image=$filename;
        }
        $slider->description = $request['description'];

        $slider->save();
        return redirect(route('sliders'))->with('status', 'Slider has added successfully');
    }

    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('slider.edit', compact('slider'));
    }

    public function update(Request $request, $id)
  
    {        
        $slider = Slider::find($id);
        $slider->title = $request['title'];
        if($request->hasFile(['image']))
        {
            $destination = 'uploads/sliders/'.$slider->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'. $extention;
            $file->move('uploads/sliders/',$filename);
            $slider->image=$filename;
        }
        $slider->description = $request['description'];

        $slider->update();
        return redirect(route('sliders'))->with('status', 'Slider has update successfully');

    }

    public function delete($id)
    {
        $slider = Slider::find($id);
        $destination = 'uploads/sliders/'.$slider->image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $slider->delete();
        return redirect()->back()->with('status', 'Slider has update successfully');

    }

}
