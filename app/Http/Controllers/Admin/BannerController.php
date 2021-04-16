<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $banners =   Banner::all();
        return view("admin.banner.list",compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view("admin.banner.create");
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
            // 'title'             =>  'unique:banners,title',
            'image'             =>  'mimes:jpg,jpeg,png'
        ]);

        $banner             = new Banner;

        $banner->title          = $request->title;
        $banner->link           = $request->link;
        $banner->description    = $request->decription;
        $banner->status         = $request->status;



        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $name = time().'_'.$image->getClientOriginalName();

            $destinationPath = public_path('/backend/images/banner');

            $imagePath = $destinationPath. "/".  $name;

            $image->move($destinationPath, $name);
            
            $banner->image = $name;
        }

        // printf($request->status."<br>".$request->title."<br>".$imagePath);

        // dd();

        $banner->save();

        session()->flash('submit', 'Record has been Added');

        return redirect('admin/banner');

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
        $banner =  Banner::find($id);

        return view('admin.banner.edit',compact('banner'));
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
            // 'title'             =>  "unique:banners,title",
            'image'             =>  'mimes:jpg,jpeg,png'
        ]);

        $banner                 = Banner::find($id);

        $banner->title          = $request->title;
        $banner->link           = $request->link;
        $banner->description    = $request->decription;
        $banner->status         = $request->status;


        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $name = time().'_'.$image->getClientOriginalName();

            $destinationPath = public_path('/backend/images/banner');

            $imagePath = $destinationPath. "/".  $name;

            $image->move($destinationPath, $name);

            $banner->image = $name;
        }


        $banner->save();

        session()->flash('update', 'Record has been Updated');

        return redirect('admin/banner');
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
        $banner = Banner::find($id);

        $banner->delete();

        session()->flash('delete', 'Record has been Deleted');

        return redirect('admin/banner');
    }
}
