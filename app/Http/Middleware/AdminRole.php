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
        // if (!Auth::check()) {
        //     # code...
        //     return redirect('/admin/login');
        // }

        // if (Auth::user()->role_id == 1) {

        //     return $next($request);

        // }

        $roles=[
            'admin'     =>   [1],
            'vendor'    =>   [2,5],
            'customer'  =>   [5]
        ];

        if (!in_array(auth()->user()->role_id,$roles)) {
            abort(403);
        }

        return $next($request);

    }
}
