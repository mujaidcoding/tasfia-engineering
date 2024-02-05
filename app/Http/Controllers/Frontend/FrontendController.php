<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Faq;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('serial', 'asc')->get();
        $projects = Project::orderBy('serial', 'asc')->get();
        $feedbacks = Testimonial::latest()->get();
        $faqs = Faq::orderBy('serial', 'asc')->get();
        $blogs = Blog::latest()->get();
        return view('frontend.home.index', compact('services', 'projects', 'feedbacks', 'faqs', 'blogs'));
    }

    public function about()
    {
        $services = Service::orderBy('serial', 'asc')->get();
        $projects = Project::orderBy('serial', 'asc')->get();
        $feedbacks = Testimonial::latest()->get();
        $faqs = Faq::orderBy('serial', 'asc')->get();
        $blogs = Blog::latest()->get();
        return view('frontend.about.index', compact('services', 'projects', 'feedbacks', 'faqs', 'blogs'));
    }

    public function services()
    {
        $projects = Project::orderBy('serial', 'asc')->get();
        $feedbacks = Testimonial::latest()->get();
        $faqs = Faq::orderBy('serial', 'asc')->get();
        $blogs = Blog::latest()->get();
        $services = Service::orderBy('serial', 'asc')->get();
        return view('frontend.services.index', compact('services', 'projects', 'feedbacks', 'faqs', 'blogs'));
    }

    public function serviceDetail($slug)
    {
        $services = Service::orderBy('serial', 'asc')->get();
        $service = Service::where('slug', $slug)->first();
        return view('frontend.services.details.index', compact('services', 'projects', 'feedbacks', 'faqs', 'blogs'));
    }

    public function projects()
    {
        $services = Service::orderBy('serial', 'asc')->get();
        $projects = Project::orderBy('serial', 'asc')->get();
        $feedbacks = Testimonial::latest()->get();
        $faqs = Faq::orderBy('serial', 'asc')->get();
        $blogs = Blog::latest()->get();
        return view('frontend.projects.index', compact('services', 'projects', 'feedbacks', 'faqs', 'blogs'));
    }

    public function feedbacks()
    {
        $services = Service::orderBy('serial', 'asc')->get();
        $projects = Project::orderBy('serial', 'asc')->get();
        $feedbacks = Testimonial::latest()->get();
        $faqs = Faq::orderBy('serial', 'asc')->get();
        $blogs = Blog::latest()->get();
        return view('frontend.testimonial.index', compact('services', 'projects', 'feedbacks', 'faqs', 'blogs'));
    }

    public function faqs()
    {
        $services = Service::orderBy('serial', 'asc')->get();
        $projects = Project::orderBy('serial', 'asc')->get();
        $feedbacks = Testimonial::latest()->get();
        $faqs = Faq::orderBy('serial', 'asc')->get();
        $blogs = Blog::latest()->get();
        return view('frontend.faqs.index', compact('services', 'projects', 'feedbacks', 'faqs', 'blogs'));
    }

    public function blogs()
    {
        $services = Service::orderBy('serial', 'asc')->get();
        $projects = Project::orderBy('serial', 'asc')->get();
        $feedbacks = Testimonial::latest()->get();
        $faqs = Faq::orderBy('serial', 'asc')->get();
        $blogs = Blog::latest()->get();

        return view('frontend.blogs.index', compact('services', 'projects', 'feedbacks', 'faqs', 'blogs'));
    }

    public function blogCategory($slug, Request $request)
    {
        $services = Service::orderBy('serial', 'asc')->get();
        $bcats = BlogCategory::latest()->get();
        $category = BlogCategory::where('category_slug', $slug)->firstOrFail();

        // Get all blogs related to the category
        $blogsQuery = $category->blogs();

        // Check if there's a search query
        $search = $request->input('search');
        if ($search) {
            // Filter blogs based on the search query
            $blogsQuery->where('title', 'like', "%$search%")
                       ->orWhere('desc', 'like', "%$search%")
                       ->orWhere('author', 'like', "%$search%");
        }

        // Get the filtered blogs
        $blogs = $blogsQuery->get();

        return view('frontend.blogs.category.index', compact('services', 'category', 'blogs', 'search', 'bcats'))->with(['search' => $request->input('search')]);
    }



    public function blogDetail($slug)
    {
        $services = Service::orderBy('serial', 'asc')->get();
        $projects = Project::orderBy('serial', 'asc')->get();
        $feedbacks = Testimonial::latest()->get();
        $faqs = Faq::orderBy('serial', 'asc')->get();
        $blogs = Blog::latest()->get();
        $blog = Blog::where('slug', $slug)->first();
        $tags = $blog->tags;
        $tags_all = explode(',', $tags);
        $bcategory = BlogCategory::latest()->get();
        $post = Blog::latest()->limit(5)->get();
        return view('frontend.blogs.details.index', compact('services', 'projects', 'feedbacks', 'faqs', 'blogs', 'blog', 'tags_all', 'bcategory', 'post'));
    }

    public function contact()
    {
        $services = Service::orderBy('serial', 'asc')->get();
        $projects = Project::orderBy('serial', 'asc')->get();
        $feedbacks = Testimonial::latest()->get();
        $faqs = Faq::orderBy('serial', 'asc')->get();
        $blogs = Blog::latest()->get();
        return view('frontend.contact.index', compact('services', 'projects', 'feedbacks', 'faqs', 'blogs'));
    }
}
