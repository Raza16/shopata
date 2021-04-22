<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    //
    public function index()
    {
        # code...
        $categories =   Category::paginate(12);

        $response["error"]  =   "false";
        $response["code"]   =   "200";
        $response["message"] =   "Operation Successfully.";
        $response["url"]    =   url('api/categories');
        $response["categories"] =   $categories;

        if(is_null($categories)){
            return response()->json("Categories not Found!",404);
        }

        return response()->json($response,200);
    }

    public function show($id)
    {
        # code...
            $category     =   Category::find($id);

            $response["error"]  =   "false";
            $response["code"]   =   "200";
            $response["message"] =   "Operation Successfully.";
            $response["url"]    =   url('api/category/'.$id);
            $response["category"] =   $category;

            if(is_null($category)){
                return response()->json("Category not Found!",404);
            }

            return response()->json($response,200);

    }
}
