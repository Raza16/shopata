<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Banner;


class BannerController extends Controller
{
    //


    public function index()
    {
        # code...
        $banners =   Banner::all();

        $response["error"]      =   "false";
        $response["code"]       =   "200";
        $response["message"]    =   "Operation Successfully.";
        $response["url"]        =   url('api/banners');
        $response["banners"]    =   $banners;

        if(is_null($banners)){

            return response()->json("banner not Found!",404);

        }

        return response()->json($response,200);

    }

    public function show($id)
    {
        # code...

            $banner     =   Banner::find($id);

            $response["error"]      =   "false";
            $response["code"]       =   "200";
            $response["message"]    =   "Operation Successfully.";
            $response["url"]        =   url('api/banner/'.$id);
            $response["banner"]     =   $banner;

            if(is_null($banner)){

                return response()->json("Brand not Found!",404);

            }

            return response()->json($response,200);

    }


}
