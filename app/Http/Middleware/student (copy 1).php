<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class student
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle( $request, Closure $next)
    {
        $user = auth()->user();

        if ($user && $user->isStudent)
        {
            if(!$user->isAdmin)
            {
                return $next($request);
            }
            else
            {
                return redirect('/student/home');
            }
        }
        return redirect('/login');
    }    
}
