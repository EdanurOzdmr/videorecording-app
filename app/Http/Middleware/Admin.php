<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::guest() && Auth::user()->role=='admin')
        {
            return $next($request);
        } else {
            return redirect(route('admin.Login'))->with('error','Erişim Yetkiniz Yok');
        }

        return redirect(route('dashboard'));
    }
}
