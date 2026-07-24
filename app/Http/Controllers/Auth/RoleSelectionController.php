<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleSelectionController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        if (!$user) {
            return redirect()->route('login');
        }

        $roles = $user->roles->pluck('role')->toArray();

        // If they only have one role, just redirect them to their dashboard
        if (count($roles) === 1) {
            session(['active_role' => $roles[0]]);
            return redirect()->route('dashboard.' . $roles[0]);
        }

        return view('auth.select-role', compact('roles'));
    }

    public function select(Request $request)
    {
        $request->validate([
            'role' => ['required', 'string', 'in:buyer,seller,driver,admin'],
        ]);

        $user = auth()->user();
        if (!$user) {
            return redirect()->route('login');
        }

        // Validate that the user actually owns this role
        if (!$user->hasRole($request->role)) {
            return redirect()->back()->with('error', 'Anda tidak memiliki peran tersebut.');
        }

        // Set active role in session
        session(['active_role' => $request->role]);

        // Redirect to appropriate dashboard
        return redirect()->route('dashboard.' . $request->role);
    }
}
