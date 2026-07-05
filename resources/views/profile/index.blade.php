@extends('layouts.app')

@section('title', 'Profil Saya - SEAPEDIA')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    
    <div class="text-center mb-10">
        <h1 class="text-3xl font-bold text-navy-600">Profil Pengguna</h1>
        <p class="text-xs text-sand-500 mt-1">Kelola data diri, peran akun, dan lihat ringkasan keuangan Anda.</p>
    </div>

    <!-- Main Card -->
    <div class="card p-8 bg-white border border-sand-300 shadow-warm">
        <!-- Identity Summary -->
        <div class="flex flex-col sm:flex-row items-center gap-6 pb-6 border-b border-sand-200">
            <div class="w-20 h-20 rounded-full bg-teal-500 text-white flex items-center justify-center font-bold text-3xl">
                {{ strtoupper(substr($user->name, 0, 2)) }}
            </div>
            <div class="text-center sm:text-left flex-grow">
                <h2 class="text-2xl font-bold text-navy-800">{{ $user->name }}</h2>
                <p class="text-sm text-sand-500 mt-0.5">@ {{ $user->username }} &bull; {{ $user->email }}</p>
                <span class="inline-flex items-center text-xs font-semibold bg-emerald-500/10 text-emerald-700 px-3 py-1 rounded-full uppercase tracking-wider mt-3">
                    Peran Aktif: {{ $activeRole }}
                </span>
            </div>
            <div>
                @if(count($roles) > 1)
                    <a href="{{ route('select-role') }}" class="btn btn-secondary text-xs font-bold py-2 px-4 rounded-full">
                        Ganti Peran
                    </a>
                @endif
            </div>
        </div>

        <!-- Role Summaries / Financial summaries -->
        <div class="mt-8">
            <h3 class="text-sm font-bold text-navy-600 uppercase tracking-wider mb-4">Informasi Finansial & Peran Anda</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Buyer info -->
                <div class="p-5 rounded-sea border {{ in_array('buyer', $roles) ? 'border-teal-500 bg-teal-500/5' : 'border-sand-300 bg-sand-100 opacity-60' }}">
                    <h4 class="text-xs font-bold uppercase tracking-wider text-teal-700 mb-2">Buyer (Pembeli)</h4>
                    @if(in_array('buyer', $roles))
                        <p class="text-sm text-sand-600">Saldo Dompet:</p>
                        <p class="text-2xl font-black text-navy-800 mt-1">
                            Rp {{ number_format($user->wallet ? $user->wallet->balance : 0, 0, ',', '.') }}
                        </p>
                        <span class="text-[10px] text-teal-600 font-semibold block mt-3">Peran Terdaftar</span>
                    @else
                        <p class="text-xs text-sand-500 italic mt-3">Peran belum terdaftar</p>
                    @endif
                </div>

                <!-- Seller info -->
                <div class="p-5 rounded-sea border {{ in_array('seller', $roles) ? 'border-coral-400 bg-coral-400/5' : 'border-sand-300 bg-sand-100 opacity-60' }}">
                    <h4 class="text-xs font-bold uppercase tracking-wider text-coral-700 mb-2">Seller (Penjual)</h4>
                    @if(in_array('seller', $roles))
                        <p class="text-sm text-sand-600">Nama Toko:</p>
                        <p class="text-lg font-bold text-navy-800 truncate mt-1">
                            {{ $user->store ? $user->store->name : 'Belum membuat toko' }}
                        </p>
                        <span class="text-[10px] text-coral-600 font-semibold block mt-3">Peran Terdaftar</span>
                    @else
                        <p class="text-xs text-sand-500 italic mt-3">Peran belum terdaftar</p>
                    @endif
                </div>

                <!-- Driver info -->
                <div class="p-5 rounded-sea border {{ in_array('driver', $roles) ? 'border-navy-500 bg-navy-500/5' : 'border-sand-300 bg-sand-100 opacity-60' }}">
                    <h4 class="text-xs font-bold uppercase tracking-wider text-navy-700 mb-2">Driver (Kurir)</h4>
                    @if(in_array('driver', $roles))
                        <p class="text-sm text-sand-600">Total Penghasilan:</p>
                        <p class="text-lg font-bold text-navy-800 mt-1">
                            Rp 0
                        </p>
                        <span class="text-[10px] text-navy-600 font-semibold block mt-3">Peran Terdaftar</span>
                    @else
                        <p class="text-xs text-sand-500 italic mt-3">Peran belum terdaftar</p>
                    @endif
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
