<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BlogsController extends Controller
{
    public function AllBlogCategory()
    {
        $action = 'index';
        $category = BlogCategory::latest()->get();
        return view('backend.admin.blogs.category.index', compact('action', 'category'));
    }

    public function StoreBlogCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'category_slug' => 'unique:blog_categories,category_slug',
        ]);

        $category = new BlogCategory();
        $category->category_name = $request->category_name;
        $category->category_slug = Str::slug($request->category_name);
        $category->save();

        return redirect()->back()->with('update', [
            'type' => 'success',
            'message' => 'Blog  Category Added Successfully.',
        ]);
    } //End Method

    public function EditBlogCategory($id)
    {
        $categories = BlogCategory::find($id);
        return response()->json($categories);
    } //End Method

    public function updateBlogCategory(Request $request)
    {
        $cat_id = $request->cat_id;

        $request->validate([
            'category_name' => 'required',
            'category_slug' => [
                Rule::unique('blog_categories')->ignore($cat_id),
            ],
        ]);

        $category = BlogCategory::find($cat_id);

        $category->category_name = $request->category_name;
        $category->category_slug = Str::slug($request->category_name);
        $category->save();

        return redirect()->back()->with('update', [
            'type' => 'success',
            'message' => 'Blog Category Updated Successfully.',
        ]);
    } //End Method


    public function DeleteBlogCategory($id)
    {
        $category = BlogCategory::find($id);

        // Check if the category has associated blog posts
        if ($category->blogs()->exists()) {
            return redirect()->back()->with('update', [
                'type' => 'error',
                'message' => 'Category Action is incomplete. Category Already attach with Blogs. Please delete first Blog Post.',
            ]);
        }

        // If no associated blog posts, proceed with deletion
        $category->delete();

        return redirect()->back()->with('update', [
            'type' => 'success',
            'message' => 'Blog Category Delete Successfully.',
        ]);
    }

    //End Method


    // ////// All blog Method //////////////////

    public function AllBlogs()
    {
        $action = 'index';
        $blogs = Blog::latest()->get();
        return view('backend.admin.blogs.index', compact('action', 'blogs'));

    } // End Method

    public function AddBlog()
    {
        $action = 'create';
        $blogcat = BlogCategory::latest()->get();
        return view('backend.admin.blogs.index', compact('action', 'blogcat'));
    } //End Method

    public function StoreBlog(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'blogcat_id' => 'required',
            'title' => 'required|unique:blogs,title',
            'slug' => 'unique:blogs,slug',
            'desc' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'tags' => 'required',
            'meta_title' => 'required',
            'meta_desc' => 'required',
            'meta_keywords' => 'required',
        ]);

        // Handle file upload if an image is present
        $img_name = null;
        if ($request->hasFile('image')) {
            $path = "Images/Blogs/photo/";
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move($path, $imageName);
            $img_name = $path . $imageName;
        }

        // Create a new Service instance
        $blog = new Blog([
            'blogcat_id' => $request->blogcat_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'desc' => $request->desc,
            'image' => $img_name,
            'tags' => $request->tags,
            'author' => Auth::user()->name,
            'meta_title' => $request->meta_title,
            'meta_desc' => $request->meta_desc,
            'meta_keywords' => $request->meta_keywords,
        ]);
        $blog->save();
        return redirect()->route('all.blogs')->with('update', [
            'type' => 'success',
            'message' => 'Blog Create Successfully.',
        ]);
    }
    //End Method

    public function EditBlog($id)
    {
        $action = 'edit';
        $blogcat = BlogCategory::all();
        $blog = Blog::findOrFail($id);
        return view('backend.admin.blogs.index', compact('action', 'blog', 'blogcat'));
    } //End Method

    public function UpdateBlog(Request $request)
    {
        $id = $request->id;

        // Validate the incoming request data

        $request->validate([
            'blogcat_id' => 'required',
            'title' => [
                'required',
                Rule::unique('blogs')->ignore($id),
            ],
            'slug' => Rule::unique('blogs')->ignore($id),
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'desc' => 'required',
            'tags' => 'required',
            'meta_title' => 'required',
            'meta_desc' => 'required',
            'meta_keywords' => 'required',
        ]);
        // Handle file upload if an image is present

        $blog = Blog::find($id);

        if ($request->hasFile('image')) {
            $oldImage = $blog->image;
            $path = "Images/Blogs/photo/";
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
        $blog->blogcat_id  = $request->blogcat_id;
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->desc = $request->desc;
        $blog->image = $img_name ?? $blog->image;
        $blog->tags = $request->tags;
        $blog->author = Auth::user()->name;
        $blog->meta_title = $request->meta_title;
        $blog->meta_desc = $request->meta_desc;
        $blog->meta_keywords = $request->meta_keywords;

        $blog->save();


        // Redirect to a success page or do something else
        return redirect()->route('all.blogs')->with('update', [
            'type' => 'success',
            'message' => 'Blog Update Successfully.',
        ]);
    } //End Method


    public function DeleteBlog($id)
    {
        $blog = Blog::find($id);
        if(!is_null($blog)) {
            if($blog->image && File::exists($blog->image)) {
                File::delete($blog->image);
            }
            $blog->delete();
        }
        return redirect()->route('all.blogs')->with('update', [
            'type' => 'success',
            'message' => 'Blog Delete Successfully.',
        ]);
    } // End Method

}
