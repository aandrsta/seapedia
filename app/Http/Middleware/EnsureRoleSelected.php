<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureRoleSelected
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if ($user) {
            // Check if the current route is select-role or logout to avoid redirect loop
            $currentRoute = $request->route()->getName();
            if (in_array($currentRoute, ['select-role', 'select-role.store', 'logout'])) {
                return $next($request);
            }

            // For APIs, they might pass X-Active-Role or rely on auth. We don't force redirect for JSON requests.
            if ($request->expectsJson()) {
                return $next($request);
            }

            $activeRole = session('active_role');

            if (!$activeRole) {
                // Get all roles
                $roles = $user->roles->pluck('role')->toArray();

                // If user has no roles (should not happen, but just in case), redirect/abort
                if (empty($roles)) {
                    auth()->logout();
                    return redirect()->route('login')->with('error', 'Akun Anda tidak memiliki peran apa pun.');
                }

                // If they have admin, admin is handled separately, let's auto-set active role to 'admin'
                if (in_array('admin', $roles)) {
                    session(['active_role' => 'admin']);
                    return $next($request);
                }

                // If they only have ONE role, auto-select it
                if (count($roles) === 1) {
                    session(['active_role' => $roles[0]]);
                    return $next($request);
                }

                // Multiple roles, redirect to select-role page
                return redirect()->route('select-role');
            }
        }

        return $next($request);
    }
}
