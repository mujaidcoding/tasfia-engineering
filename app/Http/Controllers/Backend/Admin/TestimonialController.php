<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
    public function AllFeedbacks()
    {
        $action = 'index';
        $feedbacks = Testimonial::latest()->get();
        return view('backend.admin.testimonials.index', compact('action', 'feedbacks'));
    }
    //End Method

    public function AddFeedback()
    {
        $action = 'create';
        return view('backend.admin.testimonials.index', compact('action'));
    }
    //End Method

    public function StoreFeedback(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string',
            'feedback' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'star' => 'required|integer|min:1|max:5',
        ]);

        // Handle file upload if an image is present
        $img_name = null;
        if ($request->hasFile('image')) {
            $path = "Images/Feedbacks/photo/";
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move($path, $imageName);
            $img_name = $path . $imageName;
        }

        // Create a new Service instance
        $feedback = new Testimonial([
            'name' => $request->name,
            'feedback' => $request->feedback,
            'image' => $img_name,
            'star' => $request->star,
        ]);
        // Save the Service instance to the database
        $feedback->save();
        // Redirect to a success page or do something else
        return redirect()->route('all.feedbacks')->with('update', [
            'type' => 'success',
            'message' => 'Feedback Create Successfully.',
        ]);
    }
    //End Method

    public function EditFeedback($id)
    {
        $action = 'edit';
        $feedback = Testimonial::findOrFail($id);
        return view('backend.admin.testimonials.index', compact('action', 'feedback'));
    } //End Method


    public function UpdateFeedback(Request $request)
    {
        $id = $request->id;
        $feedback = Testimonial::find($id);
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string',
            'feedback' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'star' => 'required|integer|min:1|max:5',
        ]);
        // Handle file upload if an image is present

        $img_name = $feedback->image;
        if ($request->hasFile('image')) {
            $oldImage = $feedback->image;
            $path = "Images/Feedbacks/photo/";
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();

            // Check if the new image is the same as the old image
            if ($oldImage && File::exists($oldImage) && hash_file('md5', $image->getRealPath()) === hash_file('md5', $oldImage)) {
                return redirect()->back()->with('update', [
                    'type' => 'error',
                    'message' => 'The Image is already exist please change the image',
                ]);
            }
            // Delete the old image file if it exists
            if ($oldImage && File::exists($oldImage)) {
                File::delete($oldImage);
            }

            $image->move($path, $imageName);
            $img_name = $path . $imageName;

        }
        $feedback->name = $request->name;
        $feedback->feedback = $request->feedback;
        $feedback->image = $img_name;
        $feedback->star = $request->star;
        $feedback->save();

        // Redirect to a success page or do something else
        return redirect()->route('all.feedbacks')->with('update', [
            'type' => 'success',
            'message' => 'Feedback Update Successfully.',
        ]);
    } //End Method

    public function DeleteFeedback($id)
    {
        $feedback = Testimonial::find($id);
        if(!is_null($feedback)) {
            if($feedback->image && File::exists($feedback->image)) {
                File::delete($feedback->image);
            }
            $feedback->delete();
        }
        return redirect()->route('all.feedbacks')->with('update', [
            'type' => 'success',
            'message' => 'Feedback Delete Successfully.',
        ]);
    } // End Method
}
