<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    public function AllProjects()
    {
        $action = 'index';
        $projects = Project::orderBy('serial', 'asc')->get();
        return view('backend.admin.projects.index', compact('action', 'projects'));
    }
    //End Method

    public function AddProject()
    {
        $action = 'create';
        return view('backend.admin.projects.index', compact('action'));
    }
    //End Method

    public function StoreProject(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string',
            'video' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'serial' => 'required|integer|unique:projects,serial',
        ]);

        // Handle file upload if an image is present
        $img_name = null;
        if ($request->hasFile('image')) {
            $path = "Images/Projects/photo/";
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move($path, $imageName);
            $img_name = $path . $imageName;
        }

        // Create a new Service instance
        $project = new Project([
            'name' => $request->name,
            'video' => $request->video,
            'image' => $img_name,
            'serial' => $request->serial,
        ]);
        // Save the project instance to the database
        $project->save();
        // Redirect to a success page or do something else
        return redirect()->route('all.projects')->with('update', [
            'type' => 'success',
            'message' => 'Project Create Successfully.',
        ]);
    }
    //End Method

    public function EditProject($id)
    {
        $action = 'edit';
        $project = Project::findOrFail($id);
        return view('backend.admin.projects.index', compact('action', 'project'));
    } //End Method

    public function UpdateProject(Request $request)
    {
        $id = $request->id;
        $project = Project::find($id);
        // Validate the incoming request data
        $request->validate([
            'name' => 'required',
            'video' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'serial' => [
                'required',
                'integer',
                Rule::unique('projects')->ignore($id),
            ],
        ]);
        // Handle file upload if an image is present

        if ($request->hasFile('image')) {
            $oldImage = $project->image;
            $path = "Images/Projects/photo/";
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

        $project->name = $request->name;
        $project->video = $request->video;
        $project->image = $img_name;
        $project->serial = $request->serial;
        $project->save();


        // Redirect to a success page or do something else
        return redirect()->route('all.services')->with('update', [
            'type' => 'success',
            'message' => 'Project Update Successfully.',
        ]);
    } //End Method

    public function DeleteProject($id)
    {
        $project = Project::find($id);
        if(!is_null($project)) {
            if($project->image && File::exists($project->image)) {
                File::delete($project->image);
            }
            $project->delete();
        }
        return redirect()->route('all.projects')->with('update', [
            'type' => 'success',
            'message' => 'Project Delete Successfully.',
        ]);
    } // End Method
}
