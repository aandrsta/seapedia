@extends('layouts.dashboard')

@section('title', 'Buyer Dashboard - SEAPEDIA')
@section('page_title', 'Profil & Alamat Pengiriman')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Profile & Wallet Summary Card -->
    <div class="card p-6 bg-white border border-sand-300 shadow-warm flex flex-col justify-between">
        <div>
            <h3 class="text-lg font-bold text-navy-800 mb-4">Profil Buyer</h3>
            
            <div class="space-y-4">
                <div>
                    <h4 class="text-xs font-bold text-sand-500 uppercase tracking-wider">Nama Lengkap</h4>
                    <p class="text-sm font-bold text-navy-800">{{ auth()->user()->name }}</p>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-sand-500 uppercase tracking-wider">Username</h4>
                    <p class="text-sm text-sand-700">@ {{ auth()->user()->username }}</p>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-sand-500 uppercase tracking-wider">Alamat Email</h4>
                    <p class="text-sm text-sand-700">{{ auth()->user()->email }}</p>
                </div>
            </div>
        </div>

        <div class="mt-8 pt-6 border-t border-sand-200">
            <h4 class="text-xs font-bold text-sand-500 uppercase tracking-wider mb-2">Dompet Belanja (Level 3)</h4>
            <div class="flex items-center justify-between">
                <span class="text-2xl font-black text-emerald-600">
                    Rp {{ number_format(auth()->user()->wallet ? auth()->user()->wallet->balance : 0, 0, ',', '.') }}
                </span>
            </div>
            <p class="text-[10px] text-sand-500 mt-2">Isi saldo dan riwayat transaksi akan tersedia penuh di Level 3.</p>
        </div>
    </div>

    <!-- Delivery Address Card -->
    <div class="lg:col-span-2 card p-6 bg-white border border-sand-300 shadow-warm">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-bold text-navy-800">Daftar Alamat Pengiriman</h3>
            <button class="btn btn-secondary btn-sm disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                Tambah Alamat Baru (Level 3)
            </button>
        </div>

        <!-- Addresses List -->
        <div class="space-y-4">
            @forelse(auth()->user()->addresses as $address)
                <div class="p-4 rounded-sea border border-sand-300 {{ $address->is_default ? 'bg-teal-500/5 border-teal-500' : 'bg-white' }} flex items-start justify-between">
                    <div>
                        <div class="flex items-center gap-2 mb-1">
                            <span class="text-sm font-bold text-navy-800">{{ $address->label }}</span>
                            @if($address->is_default)
                                <span class="text-[10px] bg-teal-500/10 text-teal-700 font-bold px-2 py-0.5 rounded-full uppercase">Utama</span>
                            @endif
                        </div>
                        <p class="text-xs text-sand-600 leading-relaxed">{{ $address->address }}</p>
                    </div>
                </div>
            @empty
                <div class="text-center py-10 text-sand-500 text-sm italic">
                    Belum ada alamat pengiriman terdaftar.
                </div>
            @endforelse
        </div>

        <div class="border-t border-sand-200 pt-6 mt-8">
            <h4 class="text-xs font-bold text-navy-600 uppercase tracking-wider mb-2">Pemberitahuan Fitur (Level 3)</h4>
            <p class="text-xs text-sand-600 leading-relaxed">
                Kelola alamat pengiriman, keranjang belanja multi-produk (mengikuti aturan single-store checkout), top-up saldo dompet, serta kalkulasi ongkir dan PPN 12% saat pembayaran akan diimplementasikan secara terintegrasi pada Level 3.
            </p>
        </div>
    </div>
</div>
@endsection
