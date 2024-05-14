<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use PhpParser\Node\Stmt\Return_;

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

    public function fetch()
    {
        $about = About::all();
        return response()->json([
            'abouts' => $about,
        ]);
    }


    public function store(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required'
        ]);

        // If validation fails, return the error messages
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->all()
            ]);
        } else {
            // If validation passes, proceed with storing the data
            $about = new About();
            $about->title = $request->input('title');
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/abouts/', $filename);
            $about->image = $filename;
            $about->description = $request->input('description');
            $about->save();

            // Return a success message
            return response()->json([
                'status' => 200,
                'message' => 'About added successfully.'
            ]);
        }
    }



    //     public function edit($id)
    //     {
    //         $about = About::find($id);

    //         if ($about) {
    //             return response()->json([
    //                 'status' => 200,
    //                 'about' => $about,
    //             ]);
    //         } else {
    //             return response()->json([
    //                 'status' => 404,
    //                 'message' => 'About Data Not Found',
    //             ]);
    //         }
    //     }

    //     public function update(Request $request, $id)
    // {   
    //     $about = About::find($id);

    //     if ($about) {
    //         $about->title = $request->input('title');

    //         if ($request->hasFile('image')) {
    //             $destination = 'uploads/abouts/' . $about->image;
    //             if (File::exists($destination)) {
    //                 File::delete($destination);
    //             }
    //             $file = $request->file('image');
    //             $extention = $file->getClientOriginalExtension();
    //             $filename = time() . '.' . $extention;
    //             $file->move('uploads/abouts/', $filename);
    //             $about->image = $filename;
    //         }

    //         $about->description = $request->input('description');
    //         $about->update();

    //         return response()->json([
    //             'status' => 200,
    //             'message' => 'About data updated successfully',
    //         ]);
    //     } else {
    //         return response()->json([
    //             'status' => 404,
    //             'message' => 'About Data Not Found',
    //         ]);
    //     }
    // }


    // public function edit($id)
    // {
    //     $about = About::find($id);
    //     if($about)
    //     {
    //         return response()->json([
    //         'status' => 400,
    //         'about' => $about,
    //         ]);
    //     }
    //     else
    //     {
    //         return response()->json([
    //             'status' => 200,
    //             'message' => "About not found",
    //             ]);
    //     }
    // }




    public function delete($id)
    {
        $about = About::find($id);

        if (!$about) {
            return redirect()->back()->with('error', 'About not found');
        }

        $destination = 'uploads/abouts/' . $about->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }

        $about->delete();

        return redirect()->back()->with('status', 'About has been deleted successfully');
    }

    public function edit($id)
    {
        $about = About::find($id);
        if ($about) {
            return response()->json([
                'status' => 200,
                'about' => $about,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "About not found",
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:191',
            'description' => 'required',
            'edit_image' => 'nullable|mimes:jpg,png,jpeg|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors->all(),
            ]);
        } else {
            $about = About::find($id);
            if ($about) {
                $about->title = $request->input('title');
                $about->description = $request->input('description');

                if ($request->hasFile('edit_image')) {
                    $file = $request->file('edit_image');
                    $filename = time() . '.' . $file->getClientOriginalExtension();
                    $file->move('uploads/abouts/', $filename);
                    $about->image = $filename;
                }
                $about->save();

                return response()->json([
                    'status' => 200,
                    'message' => 'About Updated Successfully',
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'About Not Found',
                ]);
            }
        }
    }
}
