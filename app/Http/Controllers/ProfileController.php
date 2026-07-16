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

    public function partnership()
    {
        $user = auth()->user();
        $roles = $user->roles->pluck('role')->toArray();

        return view('profile.partnership', compact('user', 'roles'));
    }

    public function storePartnership(Request $request)
    {
        $request->validate([
            'role' => ['required', 'in:seller,driver']
        ], [
            'role.required' => 'Pilih salah satu peran mitra untuk mendaftar.',
            'role.in'       => 'Peran kemitraan yang dipilih tidak valid.'
        ]);

        $user = auth()->user();
        $role = $request->role;

        // Prevent duplicates
        if ($user->roles()->where('role', $role)->exists()) {
            return redirect()->route('profile')->with('info', 'Anda sudah terdaftar sebagai mitra ' . ucfirst($role) . '.');
        }

        \App\Models\UserRole::create([
            'user_id' => $user->id,
            'role'    => $role,
        ]);

        // Auto-select the newly added role as active
        session(['active_role' => $role]);

        if ($role === 'seller') {
            return redirect()->route('dashboard.seller')->with('success', 'Selamat! Peran Penjual berhasil terdaftar. Silakan daftarkan toko Anda.');
        }

        return redirect()->route('dashboard.driver')->with('success', 'Selamat! Peran Kurir berhasil terdaftar. Selamat mengantar pesanan.');
    }
}
