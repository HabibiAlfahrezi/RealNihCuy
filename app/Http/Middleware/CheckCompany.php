<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckCompany
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        
        // Gantilah 'profession' dengan nama kolom yang sesuai dalam model User atau UserProfile
        if ($user && $user->prosesi === 'company') {
            return $next($request);
        }

        // Redirect atau tangani akses yang tidak diizinkan
        return redirect()->route('home')->with('error', 'Access denied. You do not have the required profession.');
    }
}
