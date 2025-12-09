<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cache;


class PreventDoubleSubmit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $cacheKey = 'form_lock_' . auth()->id() . '_' . $request->route()->getName();

        if (Cache::has($cacheKey)) {
            return redirect()->back()->with('error', 'Processing, please wait...');
        }

        Cache::put($cacheKey, true, 10);

        return $next($request);
    }
}
