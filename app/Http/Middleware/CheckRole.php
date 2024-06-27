<?php

namespace App\Http\Middleware;


use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        /*
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
        */
        // Check if user is authenticated
        if (!Auth::check()) {
            if (request()->is('backoffice')) {
                // Rediriger vers la page de connexion admin
                return redirect()->route('adminlogin'); 
            } else {

                return redirect('login');
            }
        }

        // Get the authenticated user
        $user = Auth::user();

        // Check if user has one of the required roles
        if (!in_array($user->role->name, $roles)) {
            return redirect('/'); // Or show a 403 page
        }

        //Check role
        $userAuth = User::find($user->id);
        $master_admin = $admin_user = $sale_manager = $technical_manager = false;

        // Check if user has one of the required roles
        if ($user) {
            if ($userAuth->hasRole('master_admin')) {

                $master_admin = true;

            } elseif($userAuth->hasRole('admin_user')) {

                $admin_user = true;

            } elseif($userAuth->hasRole('sale_manager')) {

                $sale_manager = true;

            } elseif($userAuth->hasRole('technical_manager')) {

                $technical_manager = true;

            }
        }

        view()->share([
            'master_admin' => $master_admin,
            'admin_user' => $admin_user,
            'sale_manager' => $sale_manager,
            'technical_manager' => $technical_manager,
        ]);

       return $next($request);
    }
}
