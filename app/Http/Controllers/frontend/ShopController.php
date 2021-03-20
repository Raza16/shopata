<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
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
    //index page
   public function home()
   {

       $blog    =Blog::orderBy('updated_at','DESC')->get();
       $product        = Product::all()->take(20);
       $product_digital        = Product::where('type','digital')->get();
       $product_featured = Product::all()->take(8);
       $setting     = Setting::where('id',1);

       return view('frontend.index',compact('blog','product','product_featured','setting','product_digital'));
   }

    // shop page 
    public function shop(Request $request)
    {
     
 
            $brand          = Brand::all();
            $category       = Category::all();
            $product        = Product::paginate(12);

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
    // product details
    public function singleshop($slug)
    {
        $product    =Product::where('slug',$slug)->first();
        // gallery 
        $gall = $product->id;
        //category 
        $category= $product->category_id;
        //grallery 
        $product_grallery = Product::find($gall)->product_grallery;
        // document
        $product_documents  =Product::find($gall)->document_product;
        // related
        $product_related  = Product::where('category_id',$category)->get();

        if($product->type == 'simple' || $product->type == 'variable'){
            return view('frontend.product_details',compact('product','product_grallery','product_related','product_documents'));
        }else{
            return view('frontend.digital_product',compact('product','product_grallery','product_related','product_documents'));

        }
    }

    public function leave_review($slug)
    {
        # code...
        $review =Product::where('slug',$slug)->first();

        return view ('frontend.leave_review',compact('review'));
    }

    //store directroy

    // download product document
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

    // blog page
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

    public function compose(View $view)
    {
        $cat    = Category::select('id','title')->get(['id','title'])->take(10);
        $view->with("cat",$cat);
    }
    

}
