<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Petugas
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
        if (Auth::check() && Auth::user()->role == 'admin') {
            return redirect()->route('admin.index');
        } elseif (Auth::check() && Auth::user()->role == 'petugas') {
            return $next($request);
        } elseif (Auth::check() && Auth::user()->role == 'pengguna') {
            return redirect()->route('pengguna.index');
        } else {
            return redirect()->route('login');
        }
    }
}
