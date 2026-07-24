@extends('layouts.guest')

@section('title', 'Masuk Ke SEAPEDIA')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="space-y-2 text-center">
        <h2 class="text-3xl font-extrabold text-white tracking-tighter leading-none">Masuk</h2>
     
    </div>

    <!-- Login Form -->
    <form action="{{ route('login') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label for="login" class="label text-sand-300 text-xs font-bold uppercase tracking-wider">Username atau Email</label>
            <input type="text" id="login" name="login" value="{{ old('login') }}" 
                   class="input-underlined @error('login') border-coral-500 @enderror" 
                   placeholder="juhooneo" required autofocus>
            @error('login')
                <p class="form-error text-coral-400 font-bold text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password" class="label text-sand-300 text-xs font-bold uppercase tracking-wider">Kata Sandi</label>
            <input type="password" id="password" name="password" 
                   class="input-underlined @error('password') border-coral-500 @enderror" 
                   placeholder="••••••••" required>
            @error('password')
                <p class="form-error text-coral-400 font-bold text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between text-xs font-semibold">
            <label class="group inline-flex items-center text-sand-300 cursor-pointer hover:text-white transition-colors">
                <div class="relative flex items-center justify-center w-4.5 h-4.5 mr-2">
                    <input type="checkbox" name="remember" class="peer appearance-none w-4.5 h-4.5 border border-white/20 rounded-[4px] bg-white/5 checked:bg-teal-500 checked:border-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-500/20 transition-all">
                    <svg class="absolute w-2.5 h-2.5 text-white pointer-events-none opacity-0 peer-checked:opacity-100 transition-opacity" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="4.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                </div>
                Ingat Saya
            </label>
        </div>

        <button type="submit" class="btn btn-primary btn-lg w-full mt-4 font-black tracking-widest text-white rounded-[8px] shadow-md">
            MASUK APLIKASI
        </button>
    </form>

    <!-- Footer Redirect -->
    <div class="text-center pt-4 border-t border-white/10">
        <p class="text-xs text-sand-400 font-medium">
            Belum memiliki akun? 
            <a href="{{ route('register') }}" class="font-bold text-teal-400 hover:text-teal-300 transition-colors underline decoration-teal-400/30 underline-offset-4">DAFTAR AKUN BARU</a>
        </p>
    </div>
</div>
@endsection
