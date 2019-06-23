<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!session()->has('admin.user')){
            return redirect(route('Admin.Login.index'))->with('error','请先登录');
        }
        //        echo "红昭愿";
        return $next($request);
    }
}
