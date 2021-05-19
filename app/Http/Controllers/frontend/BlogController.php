<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use App\Models\Admin\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog()
        {
            $blog       = Blog::orderBy('updated_at','DESC')->get();
            $latest     = Blog::orderBy('updated_at','DESC')->take(5)->get();
            $category   = Category::all()->take(7);

            return view ('frontend.blog',compact('blog','latest'));
        }
        // single blog
        public function single_blog($slug)
        {
            $blog   = Blog::where('slug',$slug)->first();
            $latest = Blog::orderBy('updated_at','DESC')->take(7)->get();

            return view ('frontend.single_blog',compact('blog','latest'));
        }
}
