<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ServiceController extends Controller
{
    public function AllServices()
    {
        $action = 'index';
        $services = Service::orderBy('serial', 'asc')->get();
        return view('backend.admin.services.index', compact('action', 'services'));
    }
    //End Method

    public function AddService()
    {
        $action = 'create';
        return view('backend.admin.services.index', compact('action'));
    }
    //End Method

    public function StoreService(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|unique:services,title',
            'slug' => 'unique:services,slug',
            'desc' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'serial' => 'required|integer|unique:services,serial',
            'meta_title' => 'required',
            'meta_desc' => 'required',
            'meta_keywords' => 'required',
        ]);

        // Handle file upload if an image is present
        $img_name = null;
        if ($request->hasFile('image')) {
            $path = "Images/Services/photo/";
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move($path, $imageName);
            $img_name = $path . $imageName;
        }

        // Create a new Service instance
        $service = new Service([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'desc' => $request->desc,
            'image' => $img_name,
            'serial' => $request->serial,
            'meta_title' => $request->meta_title,
            'meta_desc' => $request->meta_desc,
            'meta_keywords' => $request->meta_keywords,
        ]);
        // Save the Service instance to the database
        $service->save();
        // Redirect to a success page or do something else
        return redirect()->route('all.services')->with('update', [
            'type' => 'success',
            'message' => 'Service Create Successfully.',
        ]);
    }
    //End Method

    public function EditService($id)
    {
        $action = 'edit';
        $service = Service::findOrFail($id);
        return view('backend.admin.services.index', compact('action', 'service'));
    } //End Method

    public function UpdateService(Request $request)
    {
        $id = $request->id;
        $service = Service::find($id);
        // Validate the incoming request data
        $request->validate([
            'title' => [
                'required',
                Rule::unique('services')->ignore($id),
            ],
            'slug' => Rule::unique('services')->ignore($id),
            'desc' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'serial' => [
                'required',
                'integer',
                Rule::unique('services')->ignore($id),
            ],
            'meta_title' => 'required',
            'meta_desc' => 'required',
            'meta_keywords' => 'required',
        ]);
        // Handle file upload if an image is present

        if ($request->hasFile('image')) {
            $oldImage = $service->image;
            $path = "Images/Services/photo/";
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

        $service->title = $request->title;
        $service->slug = Str::slug($request->title);
        $service->desc = $request->desc;
        $service->image = $img_name;
        $service->serial = $request->serial;
        $service->meta_title = $request->meta_title;
        $service->meta_desc = $request->meta_desc;
        $service->meta_keywords = $request->meta_keywords;

        $service->save();


        // Redirect to a success page or do something else
        return redirect()->route('all.services')->with('update', [
            'type' => 'success',
            'message' => 'Service Update Successfully.',
        ]);
    } //End Method

    public function DeleteService($id)
    {
        $service = Service::find($id);
        if(!is_null($service)) {
            if($service->image && File::exists($service->image)) {
                File::delete($service->image);
            }
            $service->delete();
        }
        return redirect()->route('all.services')->with('update', [
            'type' => 'success',
            'message' => 'Service Delete Successfully.',
        ]);
    } // End Method

}
