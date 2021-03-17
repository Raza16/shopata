<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\Blog;
use App\Models\Admin\Product;
use App\Models\Admin\ProductGallery;
use App\Models\Admin\ProductDocument;
use App\Models\Admin\Setting;
use DB;

class ShopController extends Controller
{
    //
   public function home()
   {
       # code...
       $blog    =Blog::orderBy('updated_at','DESC')->get();
       $product        = Product::all()->take(20);
       $product_featured = Product::all()->take(8);
       $setting     = Setting::where('id',1);

       return view('frontend.index',compact('blog','product','product_featured','setting'));
   }

    public function shop(Request $request)
    {
     
        

        // if(isset($request->category) ){
        //     $brand          = Brand::all();
        //     $category       = Category::all();
        //      $categories = $request->category;
        //      $product = DB::table("products")->whereIn("category_id",explode( ',', $categories))->paginate(6);
        //     // $product    =Product::whereIn('category_id',$categories);

        //     //  dd($product);
        //     response->json($product);
        //     return view ('frontend.shop',compact('brand','category','product'));
        // }
 
            $brand          = Brand::all();
            $category       = Category::all();
            $product        = Product::all();

            // response->json($product);
        return view ('frontend.shop',compact('brand','category','product'));
        
    }

    public function categories($category)
    {
        # code...
        $categorys      = Category::all();
        $brand          = Brand::all();

        $category = Category::with('product')->findOrFail( $category );
        return view('frontend.category', [
            'category' => $category,
            'categorys'=> $categorys,
            'brand'    => $brand
        ]);
        // return view ('frontend.category');
    }

    public function singleshop($slug)
    {
        $product    =Product::where('slug',$slug)->first();
        $gall = $product->id;
        $product_grallery = Product::find($gall)->product_grallery;
        $product_documents  =Product::find($gall)->document_product;
        $product_related  = Product::all()->take(4);
        return view('frontend.product_details',compact('product','product_grallery','product_related','product_documents'));
    }

    //store directroy

    public function getDownload($id)
    {
        $document = ProductDocument::find($id);

        $file = public_path()."/backend/product_document/".$document->document;

        $headers = array(

            'Content-Type: application/*',
        );

        return response()->download($file, $document->document, $headers);
    }


    public function store(){
        $category   =Category::all();
        
        return view('frontend.store_directory',compact('category'));
    }

    public function blog()  
    {
        $blog       = Blog::orderBy('updated_at','DESC')->get();
        $latest     = Blog::orderBy('updated_at','DESC')->take(5)->get();
        $category   = Category::all()->take(7);
        // $category_id   = Blog::all();
        // dd($blog);
        return view ('frontend.blog',compact('blog','latest'));
    }

    public function single_blog($slug)
    {
        $blog   = Blog::where('slug',$slug)->first();
        $latest = Blog::orderBy('updated_at','DESC')->take(7)->get();

        return view ('frontend.single_blog',compact('blog','latest'));
    }

    public function blog_search(Request $request){
        if($request->ajax()) {
            $data = Blog::where('title', 'LIKE', $request->title.'%')
                ->get();
             $output = '';

             if (count($data)>0) {
                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';
                foreach ($data as $row){
                   
                    $output .= '<li class="list-group-item">'.$row->title.'</li>';
                }
                $output .= '</ul>';
            }
            else {
             
                $output .= '<li class="list-group-item">'.'No results'.'</li>';
            }

            return $output;

        }
    }

}
