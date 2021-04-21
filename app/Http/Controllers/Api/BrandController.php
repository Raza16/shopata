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
        $brands =   Brand::all();

        $response["error"]  =   "false";
        $response["code"]   =   "200";
        $response["message"] =   "Operation Successfully.";
        $response["url"]    =   url('brands');
        $response["brands"] =   $brands;

        if(is_null($brands)){

            return response()->json("Record not Found",404);

        }

        return response()->json($response,200);

    }

    public function show($id)
    {
        # code...
            $brands     =   Brand::find($id);

            $response["error"]  =   "false";
            $response["code"]   =   "200";
            $response["message"] =   "Operation Successfully.";
            $response["url"]    =   url('brands/'.$id);
            $response["brands"] =   $brands;

            if(is_null($brands)){

                return response()->json("Record not Found!",404);

            }

            return response()->json($response,200);

    }
}
