<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Roles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $roles): Response
    {
        $user =$request->user();

        if (!$user) { // galima matiti jei efsi prisijunges
            return redirect()->route('login');
        }

        if (!in_array($user->role, explode('|', $roles))) { // jei sutampa role leidžia matyti
            return abort(418, ' I\'m a teapot');
        }

        // $roles = explode('|', $roles);
        // dd($roles);

        return $next($request);
    }
}
