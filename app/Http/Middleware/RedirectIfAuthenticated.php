<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        // if (Auth::guard($guard)->check()) {
        //     // Si l'utilisateur est déjà authentifié...

        //     if (Auth::user()->isAdmin()) {
        //         // Si l'utilisateur a le rôle d'administrateur, redirigez-le vers une URL spécifique pour les administrateurs.
        //         return redirect()->route('admin.index');
        //     } elseif (Auth::user()->isEncadreur()) {
        //         // Si l'utilisateur a le rôle d'encadreur, redirigez-le vers une URL spécifique pour les encadreurs.
        //         return redirect()->route('encadreur.index');
        //     } else {
        //         // Par défaut, redirigez les autres utilisateurs vers une URL générale pour les membres.
        //         return redirect()->route('doctorant.index');
        //     }
        // }
        return $next($request);
    }
}
