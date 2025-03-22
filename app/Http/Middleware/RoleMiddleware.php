<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    
    /**

     * Handle an incoming request.
     *

     *@param \Illuminate\Http\Request $request

     *@param \Closure $next

     *@param string $role

     *@return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();
         // Check if user is authenticated and if their role matches one of the provided roles
    if (!$user || !in_array($user->role->name, $roles)) {
        return redirect('/404')->with('error', 'Unauthorized access.');
    }
        return $next($request);
    }
}
