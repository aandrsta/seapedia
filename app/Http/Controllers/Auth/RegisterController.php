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
            'name'     => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'alpha_dash', 'max:255', 'unique:users'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name'     => $request->name,
            'username' => $request->username,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Assign default 'buyer' role
        UserRole::create([
            'user_id' => $user->id,
            'role'    => 'buyer',
        ]);

        // Initialize default buyer wallet
        Wallet::create([
            'user_id' => $user->id,
            'balance' => 0.00,
        ]);

        // Auto-login the new user as buyer
        Auth::login($user);
        session(['active_role' => 'buyer']);

        return redirect()->route('home')->with('success', 'Selamat datang di SEAPEDIA, ' . $user->name . '! Akun Anda berhasil dibuat.');
    }
}
