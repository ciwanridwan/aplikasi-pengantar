<?php

namespace App\Http\Middleware;

use Closure;

class RakyatAuthenticate
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
        //JADI KITA CEK, JIKA GUARD CUSTOMER BELUM LOGIN
        if (!auth()->guard('rakyat')->check()) {
            //MAKA REDIRECT KE HALAMAN LOGIN
            return redirect(route('rakyat.login'));
        }
        return $next($request);
    }
}
