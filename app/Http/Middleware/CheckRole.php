<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade ;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        try {
            $user = auth()->user();

            if (!$user || !$user->role || $user->role->name !== $role) {
                // Journalisation de la tentative d'accès non autorisé
                \Log::warning("Tentative d'accès non autorisé à la route avec le rôle : $role");

                return response()->json(['message' => 'Accès non autorisé.'], 403);
            }
        } catch (\Exception $e) {
            // En cas d'erreur, retournez une réponse 403 générique
            return response()->json(['message' => 'Accès non autorisé.'], 403);
        }

        return $next($request);
    }
}
