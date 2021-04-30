<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            # code...
            return redirect('/admin/login');
        }

         $roles=[
            'admin'     =>   [1],
            'vendor'    =>   [2,5],
            'customer'  =>   [5]
        ];

        if (!in_array(auth()->user()->role_id,$roles)) {

            return $next($request);

        }



        // if (!in_array(auth()->user()->role_id,$roles)) {
        //     return redirect('/admin/login');
        //     // return redirect()->back();
        // }

        // return $next($request);

    }
}
