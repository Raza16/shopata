<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Admin\ProductAttribute;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\Variation;
use App\Models\Admin\VariationOption;
use App\Models\Admin\Product;
use App\Models\Admin\Sku;
use App\Models\Admin\ProductVariation;
use App\Models\Admin\ProductGallery;
use App\Models\Admin\ProductDocument;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand      =   Brand::all();

        $category   =   Category::all();

        $products    =   Product::all();

        return view('admin.product.list',compact('brand','category','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand              =   Brand::all();
        // $category           =Category::all();
        $category           =   Category::with('subcategory')->where('parent_id',NULL)->get();
        $variation          =   Variation::all();
        $variation_option   =   VariationOption::all();
        $product            =   Product::all();

        return view('admin.product.create',compact('variation','brand','category','variation_option','product'));
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
            'name' => 'required',
            'slug' =>   'required',
            'image'=>  'image|mimes:png,jpeg,webp,jpg,svg',
            // 'document.*' => 'mimes:pdf,doc,docx',
            'product_type' => 'required',
            'stock' => 'required',
            'status' => 'required'
        ]);
                        $product                    =   new  Product();
                // // tbl                                input filed
                    $product->user_id               =   Auth::user()->id;
                    $product->name  	            =   $request->name;
                    $product->slug                  =   $request->slug;
                    $product->status                =   $request->status;
                    $product->product_code          =   $request->product_code;
                    $product->long_description      =   $request->long_description;
                    $product->short_description     =   $request->short_description;
                    $product->meta_title            =   $request->meta_title;
                    $product->meta_description      =   $request->meta_description;
                    $product->meta_keywords         =   $request->meta_keywords;
                    $product->stock                 =   $request->stock;
                    $product->regular_price         =   $request->regular_price;
                    $product->sale_price            =   $request->sale_price;
                    $product->quantity              =   $request->quantity;
                    $product->item_weight           =   $request->item_weight;
                    $product->item_dimension        =   $request->item_dimension;
                    $product->tax_status            =   $request->tax_status;
                    $product->tax_class             =   $request->tax_class;
                    $product->type                  =   $request->product_type;
                    // brand
                    $product->brand_id              =   $request->brand_id;
                    // category
                    $product->category_id           =   $request->category_id;
                    // $product->product_image = $request->product_image;

                    if ($request->hasFile('product_image')) {
                        $image = $request->file('product_image');
                        $name = time().'_'.$image->getClientOriginalName();
                        $destinationPath = public_path('/backend/images/products');
                        $imagePath = $destinationPath. "/".  $name;
                        // $image->move($destinationPath, $name);
                        $product->product_image = $name;
                    }

                    dd($product);

                    if($product->save()){

                        foreach ($request->gallery_image ? : [] as $file) {
                            $filename =  time().'_'.$file->getClientOriginalName();
                            $destinationPath = public_path('backend/images/product_gallery');
                            $filePath = $destinationPath. "/".  $filename;
                            $file->move($destinationPath, $filename);
                            DB::table('product_gralleries')->insert([
                                'product_id' => $product->id,
                                'image' => $filename
                            ]);
                        }

                        foreach ($request->document ? : [] as $file) {

                            $filename =  time().'_'.$file->getClientOriginalName();
                            $destinationPath = public_path('/backend/product_document');
                            $filePath = $destinationPath. "/". $filename;
                            $file->move($destinationPath, $filename);

                        }
                    }

                        # code...

                    session()->flash('submit', 'Record has been Added');

                    return redirect('admin/product');


                                // $last_id_p = DB::table('products')->latest('id')->first();



                                //  $get_last_id   =  $last_id->id;


                        //     $sku            =       new Sku();
                        // //     //tbl                       input filed
                        // $sku->sku_code      =       $request->sku_code;
                        // $sku->price         =       $request->price;
                        // $sku->product_id    =       $last_id_p->id;

                        // dd($sku);
                            // $sku->save();
                            // $last_id_sku = DB::table('skus')->latest('id')->first();
                            // dd($last_id_sku);

                            // $product_variation  =  new ProductVariation();
                            // // tbl                          input filed
                            // $product_variation->product_id          =   $last_id_p->id;
                            // $product_variation->variant_id          =   $request->variant_id;
                            // $product_variation->variant_option_id   =   $request->variant_option_id;

                            //     // dd($product_variation);
                            //     $product_variation->save();
                                    // dd($sku);

                    // dd($product);




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
        $product            =        Product::find($id);

        $brand              =        Brand::with('products')->get();

        $category           =   Category::with('subcategory')->where('parent_id',NULL)->get();

        $product_grallery   =   Product::find($id)->product_grallery;

        $product_documents  =   Product::find($id)->document_product;

        $variations         =   Variation::all();

        return view('admin.product.edit',compact(
            'product',
            'brand',
            'category',
            'product_grallery',
            'variations',
            'product_documents'));

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
            'name' => 'required',
            'image'=>  'image|mimes:png,jpeg,webp,jpg,svg',

            'slug' =>   'required',
            'product_type' => 'required',
            'stock' => 'required',
            'status' => 'required',



        ]);
                        $product                        =   Product::find($id);
                        $product->user_id               =   Auth::user()->id;
                        $product->name  	            =   $request->name;
                        $product->slug                  =   $request->slug;
                        $product->status                =   $request->status;
                        $product->product_code          =   $request->product_code;
                        $product->long_description      =   $request->long_description;
                        $product->short_description     =   $request->short_description;
                        $product->meta_title            =   $request->meta_title;
                        $product->meta_description      =   $request->meta_description;
                        $product->meta_keywords         =   $request->meta_keywords;
                        $product->stock                 =   $request->stock;
                        $product->regular_price         =   $request->regular_price;
                        $product->sale_price            =   $request->sale_price;
                        $product->quantity              =   $request->quantity;
                        $product->item_weight           =   $request->item_weight;
                        $product->item_dimension        =   $request->item_dimension;
                        $product->tax_status            =   $request->tax_status;
                        $product->tax_class             =   $request->tax_class;
                        $product->type                  =   $request->product_type;

                        // brand
                        $product->brand_id              =   $request->brand_id;
                        // dd($product->brand_id);
                        // category
                        $product->category_id           =   $request->category_id;

                        // dd($product);
                        if ($request->hasFile('image')) {
                            $image = $request->file('image');
                            $name = time().'_'.$image->getClientOriginalName();
                        $destinationPath = public_path('/backend/images/products');
                            $imagePath = $destinationPath. "/".  $name;
                            $image->move($imagePath, $name);
                            $product->product_image = $name;
                        }

                        // dd($product->product_image);


                        if($product->save()){

                            foreach ($request->gallery_image ? : [] as $file) {
                                $filename =  time().'_'.$file->getClientOriginalName();
                                $destinationPath = public_path('/backend/images/product_gallery');
                                $filePath = $destinationPath. "/". $filename;
                                $file->move($destinationPath, $filename);
                                DB::table('product_gralleries')->insert([
                                    'product_id' => $product->id,
                                    'image' => $filename
                                ]);
                            }

                            foreach ($request->file('document') ? : [] as $file) {
                                $filename =  time().'_'.$file->getClientOriginalName();
                                $destinationPath = public_path('/backend/product_document');
                                $filePath = $destinationPath. "/". $filename;
                                $file->move($destinationPath, $filename);
                                DB::table('product_documents')->insert([
                                    'product_id' => $product->id,
                                    'document' => $filename
                                ]);
                            }

                        }

                    session()->flash('update', 'Record has been Updated');

                    return redirect('admin/product');

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
        $product = Product::find($id);
        $product->delete();
        session()->flash('delete', 'Record has been Deleted');
        return redirect('admin/product');
    }


    public function deletegallery($id){

        // dd("deleted");
        $product = ProductGallery::find($id);
        $product->delete();
        // return redirect('admin/product');
        return response()->json(['success'=>'Record has been deleted']);


    }

    public function deletedocument($id)
    {
        # code...
        $product = ProductDocument::find($id);
        $product->delete();

        // Storage::disk('document-product')->delete($product->document);
        // return redirect('admin/product');
        return response()->json(['success'=>'Document Record has been deleted']);
    }

    public function variationoption()
    {
        $variation_option = VariationOption::where('variant_id',1)->get();

        // foreach ($variation_option as $item)s {
        //     printf($item->name."<br>");
        // }

        // return response()->json(['success'=>$variation_option]);
           return response()->json(['success'=>$variation_option]);

    }

}
