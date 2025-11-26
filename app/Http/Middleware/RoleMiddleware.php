<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // If not logged in
        if (!auth()->check()) 
        {
            if ($request->expectsJson()) 
            {
                return response()->json(['message' => 'Unauthenticated.'], 401);
            }
            return redirect()->route('login');
        }

        // If user logged in
        $user = auth()->user();
        $userRoleNames = $user->roles->pluck('name')->toArray(); 
        $hasRole = !empty(array_intersect($userRoleNames, $roles));
        
        if (!$hasRole) 
        {
            if ($request->expectsJson()) 
            {
                return response()->json(['message' => 'Forbidden.'], 403);
            }

            return redirect()->back()->with('error', 'Bạn không đủ thẩm quyền'); // or: abort(403, '...');
        }

        return $next($request);
    }
}
