<?php

namespace App\Http\Middleware;

use Closure;

class AdminAccess
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
        if (session('user')['role'] === 'Admin') {
            return $next($request);
        }
        else {
            msg_flash("Vous n'avez pas accès a cette fonctionnalité", 'danger');
            return redirect()->back();
        }
    }
}
