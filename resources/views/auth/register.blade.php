@extends('layouts.guest')

@section('title', 'Daftar Akun SEAPEDIA')

@section('content')
<div x-data="{ 
    isMitra: false,
    sellerActive: false,
    driverActive: false
}" class="space-y-6">

    <!-- Header -->
    <div class="space-y-2 text-center">
        <h2 class="text-3xl font-extrabold text-white tracking-tighter leading-none" x-text="isMitra ? 'DAFTAR MITRA BISNIS' : 'BUAT AKUN BARU'">BERGABUNG</h2>
        <!-- <p class="text-sand-400 text-xs font-semibold uppercase tracking-wider" x-text="isMitra ? 'Buka Toko atau Gabung sebagai Kurir' : 'Daftar sebagai Pembeli Produk Kelautan'">
            Daftar sebagai Pembeli Produk Kelautan
        </p> -->
    </div>

    <!-- Toggle Selector (Premium Segmented Buttons, rounded-[8px])
    <div class="grid grid-cols-2 bg-white/5 p-1 border border-white/10 rounded-[8px] overflow-hidden">
        <button type="button" @click="isMitra = false" 
                :class="!isMitra ? 'bg-white text-navy-950 font-black' : 'text-sand-400 hover:text-white'"
                class="py-2.5 text-[10px] font-bold uppercase tracking-widest transition-all rounded-[6px]">
            PEMBELI
        </button>
        <button type="button" @click="isMitra = true" 
                :class="isMitra ? 'bg-white text-navy-950 font-black' : 'text-sand-400 hover:text-white'"
                class="py-2.5 text-[10px] font-bold uppercase tracking-widest transition-all rounded-[6px]">
            MITRA BISNIS
        </button>
    </div> -->

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

        <!-- Role Handling -->
        <div>
            <!-- Normal Buyer Role Hidden Mode -->
            <div x-show="!isMitra">
                <input type="hidden" name="roles[]" value="buyer">
            </div>

            <!-- Mitra Business Options Mode -->
            <div x-show="isMitra" x-cloak class="space-y-4 pt-2">
                <span class="label text-sand-300 text-center block text-xs font-bold uppercase tracking-wider">PILIH PERAN MITRA (BISA PILIH KEDUANYA)</span>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    
                    <!-- Premium Button for Seller -->
                    <button type="button" @click="sellerActive = !sellerActive"
                            :class="sellerActive ? 'border-teal-400 bg-white/10 text-white' : 'border-white/10 bg-white/5 text-sand-400'"
                            class="flex flex-col items-center justify-center p-5 border transition-all hover:border-teal-400 text-center relative rounded-[12px] select-none">
                        
                        <!-- Checkmark Indicator -->
                        <div x-show="sellerActive" class="absolute top-2 right-2 w-4 h-4 bg-teal-400 text-navy-950 flex items-center justify-center rounded-full">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                        </div>
                        
                        <svg class="w-8 h-8 mb-2 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72M6.75 18h3.5a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75h-3.5a.75.75 0 00-.75.75v3.75c0 .414.336.75.75.75z"></path></svg>
                        <span class="text-xs font-black uppercase tracking-widest">PENJUAL</span>
                        <span class="text-[9px] text-sand-400 mt-1">Buka Toko Produk</span>
                    </button>

                    <!-- Premium Button for Driver -->
                    <button type="button" @click="driverActive = !driverActive"
                            :class="driverActive ? 'border-teal-400 bg-white/10 text-white' : 'border-white/10 bg-white/5 text-sand-400'"
                            class="flex flex-col items-center justify-center p-5 border transition-all hover:border-teal-400 text-center relative rounded-[12px] select-none">
                        
                        <!-- Checkmark Indicator -->
                        <div x-show="driverActive" class="absolute top-2 right-2 w-4 h-4 bg-teal-400 text-navy-950 flex items-center justify-center rounded-full">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                        </div>
                        
                        <svg class="w-8 h-8 mb-2 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                        <span class="text-xs font-black uppercase tracking-widest">KURIR</span>
                        <span class="text-[9px] text-sand-400 mt-1">Kirim Order Pesanan</span>
                    </button>

                </div>

                <!-- Hidden Input Handlers for Laravel form submission -->
                <template x-if="sellerActive">
                    <input type="hidden" name="roles[]" value="seller">
                </template>
                <template x-if="driverActive">
                    <input type="hidden" name="roles[]" value="driver">
                </template>
                <!-- Include buyer implicitly behind the scenes when registering as business partner -->
                <input type="hidden" name="roles[]" value="buyer">

                <p class="text-[10px] text-sand-400 text-center italic">Semua akun mitra secara otomatis mendapatkan hak akses akun Pembeli.</p>
            </div>
            
            @error('roles')
                <p class="form-error text-center mt-2 text-coral-400 font-bold text-xs">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary btn-lg w-full mt-4 font-black tracking-widest text-white rounded-[8px] shadow-md">
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
