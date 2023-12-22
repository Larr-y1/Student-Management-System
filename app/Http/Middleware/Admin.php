<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle( $request, Closure $next)
   {
    $user = auth()->user();

    if ($user && $user->isAdmin)
    {
        if(!$user->isStudent)
        {
            return $next($request);
        }
        else
        {
            return redirect('/admin/home');
        }
    }
    return redirect('/login');
   }
   
}
