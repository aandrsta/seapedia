<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserRole;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'alpha_dash', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'roles' => ['required', 'array', 'min:1'],
            'roles.*' => ['in:buyer,seller,driver'],
        ], [
            'roles.required' => 'Pilih minimal satu peran (Buyer, Seller, atau Driver).',
            'roles.*.in' => 'Peran yang dipilih tidak valid.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Assign selected roles with array_unique to prevent database constraint crash
        $uniqueRoles = array_unique($request->roles);
        foreach ($uniqueRoles as $role) {
            UserRole::create([
                'user_id' => $user->id,
                'role' => $role,
            ]);

            // Initialize wallet if role includes 'buyer'
            if ($role === 'buyer') {
                Wallet::create([
                    'user_id' => $user->id,
                    'balance' => 0.00,
                ]);
            }
        }

        Auth::login($user);

        // Clear active role to force role selection (or auto-select in middleware)
        session()->forget('active_role');

        return redirect()->route('home');
    }
}
