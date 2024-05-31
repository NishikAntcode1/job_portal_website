<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function index(Request $request) {
        $blogsQuery = Blog::query(); // Initialize the query builder
    
        // Fetch all blogs and categories
        $blogs = $blogsQuery->get();
        $blog_categories = BlogCategory::withCount('blogs')->get();
    
        // Apply keyword search if provided
        if (!empty($request->keyword)) {
            $blogsQuery->where('title', 'like', '%' . $request->keyword . '%');
        }

        // Search using category
        if(!empty($request->category)) {
            $blogsQuery->where('blog_category_id',$request->category);
        }
    
        // Apply ordering and pagination
        $blogsQuery->orderByDesc('created_at');
        $blogs = $blogsQuery->paginate(4);
    
        return view('frontend.components.blog.blog_list', [
            'blogs' => $blogs,
            'blog_categories' => $blog_categories
        ]);
    }
    
    public function create_blog()
    {
        $blog_categories = BlogCategory::orderBy('name', 'ASC')->where('status', 1)->get();

        return view('frontend.components.profile.blog.create_blog', [
            'blog_categories' => $blog_categories,
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|min:5|max:200',
            'category' => 'required|integer',
            'content' => 'required',
            'main_image' => 'required|image'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->passes()) {
            $blog = new Blog();
            $blog->title = $request->title;
            $blog->content = $request->content;
            $blog->blog_category_id = $request->category;
            $blog->user_id = Auth::user()->id;

            $main_image = $request->main_image;

            $ext = $main_image->getClientOriginalExtension();
            $imageName = $request->title . '-' . time() . '.' . $ext;
            $main_image->move(public_path('/blog_image/'), $imageName);

            // Create a small thumbnail
            $sourcePath = public_path('/blog_image/' . $imageName);
            $manager = new ImageManager(Driver::class);
            $image = $manager->read($sourcePath);

            // crop the best fitting 5:3 (600x360) ratio and resize to 600x360 pixel
            $image->cover(510, 400);
            $image->toPng()->save(public_path('/blog_image/thumb/' . $imageName));

            // Delete Old Profile Pic
            // File::delete(public_path('/blog_image/thumb/' . Auth::user()->profile_pic));
            // File::delete(public_path('/blog_image/' . Auth::user()->profile_pic));

            $blog->main_image = $imageName;
            $blog->save();

            session()->flash('success', 'Blog added successfully.');
            return response()->json([
                'status' => true,
                'errors' => []
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function details($id) {
        $blog = Blog::where([
            'id' => $id
        ])->first();

        if ($blog == null) {
            abort(404);
        }

        $blog_categories = BlogCategory::withCount('blogs')->get();

        return view('frontend.components.blog.blog_details', [
            'blog' => $blog,
            'blog_categories' => $blog_categories
        ]);
    }
}
