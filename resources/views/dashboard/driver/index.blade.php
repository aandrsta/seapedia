@extends('layouts.dashboard')

@section('title', 'Driver Dashboard - SEAPEDIA')
@section('page_title', 'Ikhtisar Driver')

@section('content')
<div class="card p-8 bg-white border border-sand-300 shadow-warm">
    <div class="flex items-center gap-4 mb-6">
        <div class="p-3 bg-navy-500/10 text-navy-600 rounded-full">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
        </div>
        <div>
            <h2 class="text-2xl font-bold text-navy-800">Selamat Datang di Portal Driver!</h2>
            <p class="text-sm text-sand-600">Ambil order pengantaran barang dan dapatkan komisi pengiriman langsung.</p>
        </div>
    </div>

    <!-- Stats summary placeholders -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="p-5 rounded-sea border border-sand-300 bg-sand-50/50">
            <p class="text-xs text-sand-500 font-bold uppercase tracking-wider">Total Penghasilan (Level 5)</p>
            <p class="text-2xl font-black text-navy-800 mt-2">Rp 0</p>
        </div>
        <div class="p-5 rounded-sea border border-sand-300 bg-sand-50/50">
            <p class="text-xs text-sand-500 font-bold uppercase tracking-wider">Pekerjaan Selesai</p>
            <p class="text-2xl font-black text-navy-800 mt-2">0</p>
        </div>
        <div class="p-5 rounded-sea border border-sand-300 bg-sand-50/50">
            <p class="text-xs text-sand-500 font-bold uppercase tracking-wider">Pekerjaan Aktif</p>
            <p class="text-2xl font-black text-navy-800 mt-2">Tidak ada</p>
        </div>
    </div>

    <div class="bg-navy-50 border-l-4 border-navy-600 p-4 rounded-sea mb-8">
        <p class="text-xs text-navy-800 leading-relaxed font-semibold">
            Status driver Anda aktif. Pada Level 5, Anda dapat mencari pekerjaan pengiriman dengan status 'Menunggu Pengirim', mengambil pekerjaan tersebut, melacak status pengantaran, mengonfirmasi jika barang telah sampai, dan menerima upah kurir.
        </p>
    </div>

    <div class="border-t border-sand-200 pt-6">
        <h3 class="text-sm font-bold text-navy-600 uppercase tracking-wider mb-2">Pencarian Pekerjaan (Level 5)</h3>
        <p class="text-xs text-sand-600 leading-relaxed">
            Halaman pencarian lowongan antar barang akan dibuka pada Level 5 setelah penjual berhasil memproses barang belanjaan pembeli dan mengubah status pesanan dari 'Sedang Dikemas' menjadi 'Menunggu Pengirim'.
        </p>
    </div>
</div>
@endsection
