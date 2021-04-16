<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin\Product;
use App\Models\Admin\Seller;
use App\Models\Admin\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer\Customer;


class AdminController extends Controller
{
    //
    public function dashboard()
    {
        $user       =   User::all();
        $product    =   Product::where('status','publish');
        $customer   =   Customer::all();
        $seller     =   Seller::all();

        return view('admin.dashboard',compact('user','product','customer','seller'));
    }

    public function settings()
    {

        $admindetails =User::where('email',Auth::user()->email)->first();

        return view('admin.settings',compact('admindetails'));
    }

    public function updatedetails(Request $request)
    {

        $this->validate($request,[
            'name'  => 'required',
            'email' =>  'required',
            'profile_image' => 'image|mimes:png,jpeg,webp,jpg'
        ]);

                    $user           =   User::where('id',Auth::user()->id)->first();

                    $user->name     =   $request->name;
                    $user->email    =   $request->email;

                    // if ($request->hasFile('profile_image')) {
                    //     $image = $request->file('image');
                    //     $name = time().'_'.$image->getClientOriginalName();
                    //     $destinationPath = public_path('/backend/images/products');
                    //     $imagePath = $destinationPath. "/".  $name;
                    //     $image->move($destinationPath, $name);
                    //     $user-> = $name;
                    // }

                            $user->save();

            session()->flash('update_success_message', 'Email and Name Successfully Updated');

            return redirect()->back();
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

        if($request->isMethod('post')){

            $data = $request->all();

            if(Hash::check($data['currentpwd'],Auth::user()->password)){

                if ($data['newpwd'] == $data['confrimpwd']) {

                    User::where('id',Auth::user()->id)->update(['password'=>bcrypt($data['newpwd'])]);

                    session()->flash('updated', 'Password has been updated successfully');

                    return redirect()->back();

                }else{

                    session()->flash('confrimpwd', 'New Password and Confrim Password not match');

                    return redirect()->back();
                }
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
