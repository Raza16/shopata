<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin\Product;
use App\Models\Admin\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        $user   =User::all();
        $product    =Product::all();

        return view('admin.dashboard',compact('user','product'));
    }

    public function settings()
    {
        // Session::put('page','settings');

        // Auth::guard('admin')->user();
        $admindetails =User::where('email',Auth::user()->email)->first();

        return view('admin.settings',compact('admindetails'));
    }


    public function checkcurrentpwd(Request $request)
    {
        # code...
        $data   = $request->all();
        // echo "<pre>";print_r($data);
            //  echo Auth::user()->this->password();
        //  echo "<pre>"; print_r (Auth::user()->password); die;
        if(Hash::check($data['currentpwd'],Auth::user()->password)){
                echo "true";
        }else{
            echo "false";
        }
    }

    public function updatecurrentpwd(Request $request)
    {
        // $this->validate($request,[
        //     'currentpwd' => 'required',
        //     'newpwd' => 'required',
        // ]);

        if($request->isMethod('post')){
            $data = $request->all;
                # code...
                // print_r($data.'<br>');die;
            if(Hash::check($data['currentpwd'],Auth::user()->password)){

            }else{
                session()->flash('error_message', 'Your Current Password is Incorrect');
                return redirect()->back();
            }
        }


    }

    public function websetting($id)
    {
        # code...
        $setting = Setting::find($id);

        return view('admin.setting.setting',compact('setting'));
    }

    public function websettings(Request $request,$id)
    {
        # code...
        $this->validate($request,[
            'title' => 'required',
            // 'site_url'=>'required',


        ]);

                        $setting    = Setting::find($id);
                        //table             input filed

                        $setting->title                 = $request->title;
                        $setting->tagline               = $request->tagline;
                        $setting->site_url              = $request->site_url;
                        $setting->email                 = $request->email;
                        $setting->phone                 = $request->phone;
                        $setting->address               = $request->address;

                        if ($request->hasFile('logo')) {
                            $image = $request->file('logo');
                            $name = time().'_'.$image->getClientOriginalName();
                            $destinationPath = public_path('/backend/images');
                            $imagePath = $destinationPath. "/".  $name;
                            $image->move($destinationPath, $name);
                            $setting->logo = $name;
                        }

                        if ($request->hasFile('fav_icon')) {
                            $image = $request->file('fav_icon');
                            $name = time().'_'.$image->getClientOriginalName();
                            $destinationPath = public_path('/backend/images');
                            $imagePath = $destinationPath. "/".  $name;
                            $image->move($destinationPath, $name);
                            $setting->favicon = $name;
                        }



                        // dd($setting->logo);
                                // dd($setting);
                    session()->flash('update', 'Record has been Updated');

                                $setting->save();




                        return redirect()->back();
    }

}
