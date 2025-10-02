<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class CheckRole
{
    /**

    * Handle an incoming request.
    *
    * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
    */
public function handle(Request $request, Closure $next): Response{
    if (!Auth::check()){
        return redirect('/login');}
     if (! $request->user() || $request->user()->role !== 'admin') {
        abort(403, 'Admins only.');}
    return $next($request);

    }
}
