<?php

namespace App\Http\Controllers\frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer\Customer;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("frontend.account");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $this->validate($request,[
            'email'         => 'required|unique:users,email',
            'password'      => 'required|min:8',
            'first_name'    => 'required',
            'last_name'     => 'required',
        ]);

        try{

            $user   = new User;
            $user->name         = $request->first_name;
            $user->email        = $request->email;
            $user->password     = $request->password;
            $user->role_id      = $request->client_type;

            if ($user->save()){
                # code...
                $customer   = new Customer;

                $customer->first_name   = $request->first_name;
                $customer->last_name    = $request->last_name;
                $customer->address      = $request->address;
                $customer->city         = $request->city;
                $customer->postal_code  = $request->postal_code;
                $customer->country      = $request->country;
                $customer->phone        = $request->phone;
                $customer->user_id      = $user->id;
            }
            $customer->save();
            // dd($customer->user_id);
            return "Successfully instered";
        }catch(Exception $e){
            return "error<br>".$e;
        }
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
