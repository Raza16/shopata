<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Variation;
use App\Models\Admin\VariationOption;

class ProductAttributeOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

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
            // input filed                  //validations
            'name'          =>   'required',

       ]);

                        $variationOption = new VariationOption;
            //col filed                                     // input filed
            //              product attribute option col add start
            $variationOption->name                   =   $request->name;
            $variationOption->variant_id             =   $request->product_att_id;
            $variationOption->save();
           return redirect()->back();
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
        $variation              =Variation::find($id);
        $variation_option       =VariationOption::where('variant_id',$id)->get();
        return view('admin/product/variation_option/list',compact('variation','variation_option'));
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
        // $variation              =Variation::find($id);
        $variation_option       =VariationOption::find($id);
        return view('admin.product.variation_option.edit',compact('variation_option'));

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
        $this->validate($request,[
            // input filed                  //validations
            'name'          =>   'required',

       ]);

                        $variationOption = VariationOption::find($id);
            //col filed                                     // input filed
            //              product attribute option col add start
            $variationOption->name                   =   $request->name;
            $variationOption->variant_id             =   $request->variant_id;
            $variationOption->save();

            return redirect('admin/variation_option/'.$request->variant_id);

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
        $variation_option = VariationOption::find($id);
        $variation_option->delete();
        session()->flash('delete', 'Record has been Deleted');
        return redirect()->back();
    }
}
