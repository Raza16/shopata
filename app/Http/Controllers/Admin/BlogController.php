<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Blog;
use App\Models\Admin\Category;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $blog=Blog::all();
        return view('admin.blogs.list',compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category   =Category::all();
        return view('admin.blogs.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'title'  => 'required',
        ]);
                        $blog =new Blog();
          //    tb_col                   input_filed
            $blog->title                =   $request->title;
            $blog->slug                 =   $request->slug;
            $blog->description          =   $request->description;
            $blog->meta_title           =   $request->meta_title;
            $blog->meta_description     =   $request->meta_description;
            $blog->meta_keywords        =   $request->meta_keywords;
            $blog->category_id          =   $request->category_id;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = time().'_'.$image->getClientOriginalName();
                $destinationPath = public_path('/backend/images/blogs/feature_image');
                $imagePath = $destinationPath. "/".  $name;
                $image->move($destinationPath, $name);
                $blog->image = $name;
            }
            // dd($blog);
            $blog->save();

            session()->flash('submit', 'Record has been Added');

            return redirect('admin/blog');
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        
        $blog = Blog::where('slug',$slug)->first();
        return view ('frontend.single_blog',compact('blog'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        //
        $category   =Category::all();
        $blog = Blog::where('slug',$slug)->first();
        return view('admin.blogs.edit',compact('blog','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        //
        $this->validate($request,[
            'title'  => 'required',
        ]);

                        $blog =Blog::where('slug',$slug)->first();
          //    tb_col                   input_filed
            $blog->title                =   $request->title;
            $blog->slug                 =   $request->slug;
            $blog->description          =   $request->description;
            $blog->meta_title           =   $request->meta_title;
            $blog->meta_description     =   $request->meta_description;
            $blog->meta_keywords        =   $request->meta_keywords;
            $blog->category_id          =   $request->category_id;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = time().'_'.$image->getClientOriginalName();
                $destinationPath = public_path('/backend/images/blogs/feature_image');
                $imagePath = $destinationPath. "/".  $name;
                $image->move($destinationPath, $name);
                $blog->image = $name;
            }
  

            $blog->save();

            session()->flash('update', 'Record has been Update');

            return redirect('admin/blog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        //
        $blog = Blog::find($slug);
        $blog->delete();
        session()->flash('delete', 'Record has been Deleted');
        return redirect('admin/blog');
    }


    public function uploadImage(Request $request) {	

        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $name = time().'_'.$image->getClientOriginalName();
        //     $destinationPath = public_path('/backend/images/blogs/feature_image');
        //     $imagePath = $destinationPath. "/".  $name;
        //     $image->move($destinationPath, $name);
        //     $blog->image = $name;
        // }

        // if($request->hasFile('upload')){
        //     $image =$request->file('upload');
        //     $name  =time().'_'.$image->getClientOriginalName();
        //     $destinationPath ='http://127.0.0.1:8000/'.public_path('/backend/images/blogs');
        //     // $imagePath  = 
        // }

        if($request->hasFile('upload')) {
                $originName = $request->file('upload')->getClientOriginalName();
                
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $request->file('upload')->getClientOriginalExtension();
                $fileName = $fileName.'_'.time().'.'.$extension;
               
                $request->file('upload')->move(public_path('backend/images/blogs'), $fileName);
       
                $CKEditorFuncNum = $request->input('CKEditorFuncNum');
                $url = asset('images/'.$fileName); 
                $msg = 'Image uploaded successfully'; 
                $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
                   
                @header('Content-type: text/html; charset=utf-8'); 
                echo $response;
            }
        }	


}
