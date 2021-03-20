<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $category =Category::orderBy('title','ASC')->get();
        return view('admin.category.list',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category   =Category::count();
        $parent_id  =Category::select('parent_id','id','title')->get();
        return view('admin.category.create',compact('category','parent_id'));
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
        $this->validate($request, [
            //input filde
            'title'             =>  'required',
            'image'             =>  'mimes:jpg,bmp,png,webp'
        ]);

                        $category = new Category;
        //      tb_col                       input_filed
            $category->title                =   $request->title;
            $category->slug                 =   $request->slug;
            $category->parent_id            =   $request->parent_id;
            $category->user_id              =   Auth::user()->id;
            $category->section_id           =   $request->section_id;
            
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = time().'_'.$image->getClientOriginalName();
                $destinationPath = public_path('/backend/images/category');
                $imagePath = $destinationPath. "/".  $name;
                $image->move($destinationPath, $name);
                $category->image = $name;
            }
            
            $category->save();

            session()->flash('submit', 'Record has been Added');

            return redirect('admin/category');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category       = Category::find($id);
        $count          =Category::count();
        $parent_id      =Category::select('parent_id','id','title')->get();
        return view('admin.category.edit',compact('category','count','parent_id'));
    }

    /** 
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            //input filde
            'title'             =>  'required',
            'image'             =>  'mimes:jpg,bmp,png,webp'
        ]);

                        $category = Category::find($id);
        //      tb_col                       input_filed
                $category->title                =     $request->title;
                $category->slug                 =   $request->slug;
                $category->parent_id            =   $request->parent_id;
                $category->user_id              =   Auth::user()->id;


            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = time().'_'.$image->getClientOriginalName();
                $destinationPath = public_path('/backend/images/category');
                $imagePath = $destinationPath. "/".  $name;
                $image->move($destinationPath, $name);
                $category->image = $name;
            }
            
            $category->save();

            session()->flash('update', 'Record has been Updated');

            return redirect('admin/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $category = Category::find($id);
        $category->delete();
        session()->flash('delete', 'Record has been Deleted');
        return redirect('admin/category');
    }
}
