<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Brand;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands =Brand::all();
        return view('admin.brand.list',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.brand.create');
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
            'title'             =>  'required|unique:brands,title',
            'meta_title'        =>  'max:60',
            'meta_description'  =>  'max:160',
            'image'             =>  'mimes:jpg,jpeg,png'
        ]);


                $brand = new Brand;
            //      tb_col                       input_filed
                $brand->title               =  $request->title;
                // $brand->slug             =  $request->slug;
                $brand->description         =  $request->description;
                $brand->meta_title          =  $request->meta_title;
                $brand->meta_keyword        =  $request->meta_keyword;
                $brand->meta_description    =  $request->meta_description;
                $brand->user_id             =   Auth::user()->id;

                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $name = time().'_'.$image->getClientOriginalName();
                    $destinationPath = public_path('/backend/images/brands');
                    $imagePath = $destinationPath. "/".  $name;
                    $image->move($destinationPath, $name);
                    $brand->image = $name;
                }

                $brand->save();

                session()->flash('submit', 'Record has been Added');

                return redirect('admin/brand');


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
        $brand =Brand::find($id);
        return view('admin.brand.edit',compact('brand'));
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
            'title'             =>  "required|unique:brands,title,$id",
            'meta_title'        =>  'max:60',
            'meta_description'  =>  'max:160',
            'image'             =>  'mimes:jpg,jpeg,png'
        ]);


                             $brand = Brand::find($id);
            //      tb_col                       input_filed
                    $brand->title               =  $request->title;
                    // $brand->slug               =  $request->slug;
                    $brand->description         =  $request->description;
                    $brand->meta_title          =  $request->meta_title;
                    $brand->meta_keyword        =  $request->meta_keyword;
                    $brand->meta_description    =  $request->meta_description;
                    $brand->user_id            =   Auth::user()->id;

                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $name = time().'_'.$image->getClientOriginalName();
                    $destinationPath = public_path('/backend/images/brands');
                    $imagePath = $destinationPath. "/".  $name;
                    $image->move($destinationPath, $name);
                    $brand->image = $name;
                }

                $brand->save();

                session()->flash('updated', 'Record has been Upadated');

                return redirect('admin/brand');

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
        $brand = Brand::find($id);
        $brand->delete();
        session()->flash('delete', 'Record has been Deleted');
        return redirect('admin/brand');

    }
}
