<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Variation;

class ProductAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $variation=Variation::all();
        return view('admin.product.variation.list',compact('variation'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $variation=Variation::all();
        return view('admin.product.variation.list',compact('variation'));

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
            'name'             =>  'required',
           
        ]);
                            $variation = new Variation;
                        //      tb_col                       input_filed
                        $variation->name               =  $request->name;

                        $variation->save();
                        session()->flash('submit', 'Record has been Inserted');
                        return redirect('admin/variation');

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
        $variation_all=Variation::all();
        $variation=Variation::find($id);
        // dd($variation);
        return view('admin.product.variation.edit',compact('variation','variation_all'));

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
            'name'             =>  'required',
           
        ]);
                $variation = Variation::find($id);
                // $brand = Brand::find($id);
                //    tb_col                         input_filed
                $variation->name               =  $request->name;

                $variation->save();
                session()->flash('update', 'Record has been Updated');
                return redirect('admin/variation');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $variation = Variation::find($id);
        $variation->delete();
        session()->flash('delete', 'Record has been Deleted');
        return redirect('admin/variation');
    }
}
