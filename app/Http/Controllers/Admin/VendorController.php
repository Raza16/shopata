<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin\Seller;
use Hash;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $seller =Seller::all();
        return view('admin.vendor.list',compact('seller'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.vendor.create');
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
        $this->validate($request, [
            //input filde
            'first_name'             =>  'required',
            'last_name'              =>  'required',
            'username'               =>  'required',
            'email'                  =>  'email|required',
            'password'               =>  'required',
            'mobile'                 =>  'required',
            'company_name'           =>   'required',

        ]);

              $user           =new User;
                        // tbl                       input filed

                    $user->name                   = $request->username;
                    $user->email                  = $request->email;
                    $user->password               = Hash::make($request->password);
                    $user->role_id                = 2;
                    $user->status                 = $request->status;

                    if($user->save()){

                        
                                        $seller = new Seller();
                                // tbl                          input filed

                            $seller->first_name             =   $request->first_name;
                            $seller->last_name              =   $request->last_name;
                            $seller->username               =   $request->username;
                            $seller->company_email          =   $request->company_email;
                            $seller->mobile                 =   $request->mobile;
                            $seller->country                =   $request->country;
                            $seller->city                   =   $request->city;
                            $seller->state                  =   $request->state;
                            $seller->postal_code            =   $request->postal_code;
                            $seller->company_name           =   $request->company_name;
                            $seller->company_address        =   $request->company_address;
                            $seller->status                 =   $request->status;
                            $seller->user_id                =   $user->id;  

                            if ($request->hasFile('company_logo')) {
                                $image = $request->file('company_logo');
                                $name = $seller->company_name.'_'.$image->getClientOriginalName();
                                $destinationPath = public_path('/backend/images/vendor');
                                $imagePath = $destinationPath. "/".  $name;
                                $image->move($destinationPath, $name);
                                $seller->company_logo = $name;
                            }

                            if ($request->hasFile('image')) {
                                $image = $request->file('image');
                                $name = $seller->company_name.'_'.$image->getClientOriginalName();
                                $destinationPath = public_path('/backend/images/vendor');
                                $imagePath = $destinationPath. "/".  $name;
                                $image->move($destinationPath, $name);
                                $seller->company_logo = $name;
                            }

                    }
                                $seller->save();
                                        
                                return redirect('admin/vendor/');

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
        $seller =Seller::find($id);
        return view('admin.vendor.edit',compact('seller'));
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
        $this->validate($request, [
            //input filde
            'first_name'             =>  'required',
            'last_name'              =>  'required',
            'username'               =>  'required',
            'email'                  =>  'email|required',
            'password'               =>  'required',
            'mobile'                 =>  'required',
            'company_name'           =>   'required',

        ]);

        // dd($user->user_id);
                            $user_id = $request->user_id;

           


                        $user           =  User::find($user_id,'id');
                        // tbl                       input filed

                    $user->name                   = $request->username;
                    $user->email                  = $request->email;
                    $user->password               = Hash::make($request->password);
                    $user->role_id                = 2;
                    $user->status                 = $request->status;

                    // dd($user);
                    
                    

                    if($user->save()){
                        
                                        $seller =  Seller::find($id);
                                // tbl                          input filed

                            $seller->first_name             =   $request->first_name;
                            $seller->last_name              =   $request->last_name;
                            $seller->username               =   $request->username;
                            $seller->company_email          =   $request->company_email;
                            $seller->mobile                 =   $request->mobile;
                            $seller->country                =   $request->country;
                            $seller->city                   =   $request->city;
                            $seller->state                  =   $request->state;
                            $seller->postal_code            =   $request->postal_code;
                            $seller->company_name           =   $request->company_name;
                            $seller->company_address        =   $request->company_address;
                            $seller->status                 =   $request->status;
                            $seller->user_id                =   $user->id;  

                            if ($request->hasFile('company_logo')) {
                                $image = $request->file('company_logo');
                                $name = $seller->company_name.'_'.$image->getClientOriginalName();
                                $destinationPath = public_path('/backend/images/vendor');
                                $imagePath = $destinationPath. "/".  $name;
                                $image->move($destinationPath, $name);
                                $seller->company_logo = $name;
                            }

                            if ($request->hasFile('image')) {
                                $image = $request->file('image');
                                $name = $seller->company_name.'_'.$image->getClientOriginalName();
                                $destinationPath = public_path('/backend/images/vendor');
                                $imagePath = $destinationPath. "/".  $name;
                                $image->move($destinationPath, $name);
                                $seller->company_logo = $name;
                            }

                    }
                                $seller->save();
                                        
                                return redirect('admin/vendor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //
        // $user_id =$request->user_id;
        // dd($user_id);
        // dd($id);
        $user =User::find($id);
        $user->delete();
        // $seller = Seller::delete($id);

        return redirect('admin/vendor');
    }
}
