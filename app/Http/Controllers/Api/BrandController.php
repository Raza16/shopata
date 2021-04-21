<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    //
    public function index()
    {
        # code...
        $brands =   Brand::paginate(12);

        $response["error"]      =   "false";
        $response["code"]       =   "200";
        $response["message"]    =   "Operation Successfully.";
        $response["url"]        =   url('api/brands');
        $response["brands"]     =   $brands;

        if(is_null($brands)){

            return response()->json("Record not Found!",404);

        }

        return response()->json($response,200);

    }

    public function show($id)
    {
        # code...
            $brand     =   Brand::find($id);

            $response["error"]      =   "false";
            $response["code"]       =   "200";
            $response["message"]    =   "Operation Successfully.";
            $response["url"]        =   url('api/brand/'.$id);
            $response["brand"]      =   $brand;

            if(is_null($brand)){

                return response()->json("Record not Found!",404);

            }

            return response()->json($response,200);

    }

}
