<?php

namespace App\Http\Controllers;

use  App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index()
    {
        $slider = Slider::all();
        return view('slider.index', compact('slider'));
    }

    public function store(Request $request)
    {
        $slider = new Slider();
        $slider->title = $request['title'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/sliders/', $filename);
            $slider->image = $filename;
        }
        $slider->description = $request['description'];
        $slider->save();

        return response()->json(['status' => 'success', 'message' => 'Slider added successfully']);
    }

    public function edit(Request $request)
    {
        $slider = Slider::find($request->id);
        return response()->json($slider);
    }

    public function update(Request $request)
    {
        $slider = Slider::find($request->id);
        $slider->title = $request['title'];

        if ($request->hasFile('image')) {
            $destination = 'uploads/sliders/' . $slider->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/sliders/', $filename);
            $slider->image = $filename;
        }
        $slider->description = $request['description'];
        $slider->save();

        return response()->json(['status' => 'success', 'message' => 'Slider updated successfully']);
    }

    public function delete(Request $request)
    {
        $slider = Slider::find($request->id);
        $destination = 'uploads/sliders/' . $slider->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $slider->delete();

        return response()->json(['status' => 'success', 'message' => 'Slider deleted successfully']);
    }
}
