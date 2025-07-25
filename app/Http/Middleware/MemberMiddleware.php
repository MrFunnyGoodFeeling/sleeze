<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;

class MemberMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check() && Auth::user()->isMember()){
            return $next($request);
        }

        return redirect('/restricted-area');
    }

}
