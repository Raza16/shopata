<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use App\Models\Admin\ProductGallery;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        # code...
        $products   =   Product::with([
            "product_grallery",
            "document_product",
            "category",
            "brand"
            ])->paginate(12);

        $response["error"]              =   "false";
        $response["code"]               =   "200";
        $response["message"]            =   "Operation Successfully.";
        $response["url"]                =   url('api/products');
        $response["image-url"]          =   url("backend/images/products");
        $response["gallery-image-url"]  =   url("backend/images/product_gallery");
        $response["document-url"]       =   url("backend/product_document");
        $response["products"]           =   $products;

        if(is_null($products)){
            return response()->json("Products not Found!",404);
        }

        return response()->json($response,200);

    }

    public function show($id)
    {
        # code...
            $product     =   Product::with(["product_grallery","document_product","category","brand"])->find($id);

            $response["error"]              =   "false";
            $response["code"]               =   "200";
            $response["message"]            =   "Operation Successfully.";
            $response["url"]                =   url('api/product/'.$id);
            $response["image-url"]          =   url("backend/images/products");
            $response["gallery-image-url"]  =   url("backend/images/product_gallery");
            $response["document-url"]       =   url("backend/product_document");
            $response["product"]    =   $product;

            if(is_null($product)){
                return response()->json("Product not Found!",404);
            }

            return response()->json($response,200);

    }
}
