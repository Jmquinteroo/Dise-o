<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$x)
    {



//        if (!$request->user()->Hasrole('admin')) {
        if (Auth::check()){
        if (!$request->user()->can($x)) {
            abort(403, "¡No tienes edad para ver este video! le diremos a tus padres.");
        }


        }else{
            return back();

        }
        return $next($request);
    }
}
