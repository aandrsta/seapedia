<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckActiveRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!$request->user()) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Unauthenticated.'], 401);
            }
            return redirect()->route('login');
        }

        // Admin override: Admin can access admin panel directly, but if they are trying to access admin panel, active_role must be admin.
        // For non-admin accounts, one username may own more than one role at the same time.
        // Authorization must follow the active role, not merely the full list of roles owned by the user.
        $activeRole = session('active_role');
        
        // For API requests, check header or request parameter as fallback if session is not used
        if ($request->expectsJson()) {
            $activeRole = $request->header('X-Active-Role') ?: $activeRole;
        }

        if ($activeRole !== $role) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Unauthorized for this role.'], 403);
            }
            
            // Redirect to select-role if they own the role but it is not active
            if ($request->user()->hasRole($role)) {
                return redirect()->route('select-role')->with('error', 'Silakan pilih peran ' . ucfirst($role) . ' terlebih dahulu.');
            }

            return redirect()->route('home')->with('error', 'Anda tidak memiliki akses ke halaman tersebut.');
        }

        return $next($request);
    }
}
