<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
        protected $redirectTo;

        public function redirectTo(){

            if (!Auth::check()) {
                return $this->redirectTo = '/admin/login';
            }

            if (Auth::user()->role_id == 1) {
                return $this->redirectTo = '/admin/dashboard';
            }

            if (Auth::user()->role_id == 5) {
                return $this->redirectTo = '/';
            }

        }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login');
    }

}
