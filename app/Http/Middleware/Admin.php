<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Admin
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
        $user=auth()->user();
        if ($user)
        {
            if($user->role=='admin')
            {
                return $next($request);
            }
            else
                {
                return redirect()->route('index');
            }

        }
        return redirect()->route('index');

    }
}
