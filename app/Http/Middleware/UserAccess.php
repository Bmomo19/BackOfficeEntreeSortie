<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Http;

class UserAccess
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

        if (session('user')['role'] === "Admin") {
            return $next($request);
        }

        if (session('user')['role'] === "Chef virgile") {
            $response = Http::get(config('app.api_url')."/users/".request('id'));
            $user = $response->json();
            if ($user && ($user['role'] === "Virgile" || session('user')['identifiant'] === request('id')) ) {
                return $next($request);
            }else {
                msg_flash("Vous n'avez pas accès a cette fonctionnalité", 'danger');
                return redirect()->back();
            }   
        }

        if (session('user')['identifiant'] === request('id')) {
            return $next($request);
        }else {
            msg_flash("Vous n'avez pas accès a cette fonctionnalité", 'danger');
            return redirect()->back();
        }
    }
}
