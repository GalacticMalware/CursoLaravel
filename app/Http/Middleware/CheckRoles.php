<?php

namespace App\Http\Middleware;
use App\Http\Controllers\Invitado;
use Closure;

class CheckRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next /*,$role*/)
    {
        //arrays los que no queremos y func lo que pasa por handle
        $roles = array_slice(func_get_args(),2);

        
            if(auth()->user()->hasRoles($roles)){
                // if(auth()->user()->role == $role){
                     return $next($request);
                 }
        
        

        return redirect('/');
    }
}
