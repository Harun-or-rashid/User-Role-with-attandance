<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Collection;

class CheckAdmin
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
        $role=Auth::user()->roles->pluck('role_id');

//        need to check
//        dd($role);
        if(!$role->contains('1')){
            return redirect('signin');
        }
        return $next($request);
    }
}
