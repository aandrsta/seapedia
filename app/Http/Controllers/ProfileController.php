<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if (!$user) {
            return redirect()->route('login');
        }

        $roles = $user->roles->pluck('role')->toArray();
        $activeRole = session('active_role');

        return view('profile.index', compact('user', 'roles', 'activeRole'));
    }
}
