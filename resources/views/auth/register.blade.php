@extends('layouts.guest')

@section('title', 'Daftar Akun SEAPEDIA')

@section('content')
<div class="space-y-6">

    <!-- Header -->
    <div class="space-y-2 text-center">
        <h2 class="text-3xl font-extrabold text-white tracking-tighter leading-none">BUAT AKUN BARU</h2>
        <p class="text-sand-400 text-xs font-semibold uppercase tracking-wider">
            Daftar untuk mulai menjelajah produk kelautan
        </p>
    </div>

    <!-- Registration Form -->
    <form action="{{ route('register') }}" method="POST" class="space-y-5">
        @csrf

        <!-- Name & Username Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <label for="name" class="label text-sand-300 text-xs font-bold uppercase tracking-wider">Nama Lengkap</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" 
                       class="input-underlined @error('name') border-coral-500 @enderror" 
                       placeholder="JUHOON KIM" required autofocus>
                @error('name')
                    <p class="form-error text-coral-400 font-bold text-xs mt-1.5">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="username" class="label text-sand-300 text-xs font-bold uppercase tracking-wider">Username</label>
                <input type="text" id="username" name="username" value="{{ old('username') }}" 
                       class="input-underlined @error('username') border-coral-500 @enderror" 
                       placeholder="juhooneo" required>
                @error('username')
                    <p class="form-error text-coral-400 font-bold text-xs mt-1.5">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="label text-sand-300 text-xs font-bold uppercase tracking-wider">Alamat Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" 
                   class="input-underlined @error('email') border-coral-500 @enderror" 
                   placeholder="juhoonkim@example.com" required>
            @error('email')
                <p class="form-error text-coral-400 font-bold text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>

        <!-- Passwords Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <label for="password" class="label text-sand-300 text-xs font-bold uppercase tracking-wider">Kata Sandi</label>
                <input type="password" id="password" name="password" 
                       class="input-underlined @error('password') border-coral-500 @enderror" 
                       placeholder="••••••••" required>
                @error('password')
                    <p class="form-error text-coral-400 font-bold text-xs mt-1.5">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="label text-sand-300 text-xs font-bold uppercase tracking-wider">Konfirmasi Sandi</label>
                <input type="password" id="password_confirmation" name="password_confirmation" 
                       class="input-underlined" placeholder="••••••••" required>
            </div>
        </div>

        <button type="submit" class="btn btn-light btn-lg w-full mt-4 font-black tracking-widest text-white rounded-[8px] shadow-md">
            BUAT AKUN SEKARANG
        </button>
    </form>

    <!-- Footer Redirect -->
    <div class="text-center pt-2">
        <p class="text-xs text-sand-400 font-medium">
            Sudah memiliki akun? 
            <a href="{{ route('login') }}" class="font-bold text-teal-400 hover:text-teal-300 transition-colors underline decoration-teal-400/30 underline-offset-4">MASUK DISINI</a>
        </p>
    </div>
</div>
@endsection
