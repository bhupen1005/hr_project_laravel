<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;

class AuthUser
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
        if(!session('user_id') )
        {
            return redirect('login');
        }

        return $next($request);
    }
}
