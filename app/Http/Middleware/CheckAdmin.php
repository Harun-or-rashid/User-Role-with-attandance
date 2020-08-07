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
        $roles = array();
        foreach (Auth::user()->roles as $roleuser) {
            $roles[] = $roleuser->role->name;
        }

//        need to check
//        dd($role);
        if(!in_array('admin', $roles)){
            return redirect('signin');
        }
        return $next($request);
    }
}
