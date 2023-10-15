<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,...$roles): Response
    {
        echo var_dump(in_array($request->user()->role,$roles));
        if($request->user() && in_array($request->user()->role, $roles)){
            return $next($request);
        }
        return abort(403, 'Permission denied');
    }
}
