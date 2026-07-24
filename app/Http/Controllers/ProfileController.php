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

    public function update(Request $request)
    {
        $user = auth()->user();
        if (!$user) {
            return redirect()->route('login');
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'avatar.image' => 'File foto profil harus berupa gambar.',
            'avatar.mimes' => 'Format foto profil harus jpeg, png, jpg, gif, atau webp.',
            'avatar.max' => 'Ukuran foto profil maksimal 2MB.',
        ]);

        $data = [
            'name' => $request->name,
        ];

        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists
            if ($user->avatar && \Illuminate\Support\Facades\Storage::disk('public')->exists($user->avatar)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($user->avatar);
            }

            $path = $request->file('avatar')->store('avatars', 'public');
            $data['avatar'] = $path;
        }

        $user->update($data);

        return redirect()->route('profile')->with('success', 'Foto & profil Anda berhasil diperbarui!');
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
