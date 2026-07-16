@extends('layouts.app')

@section('title', 'Profil Saya - SEAPEDIA')

@section('content')
<section class="bg-sand-100 py-16 min-h-[calc(100vh-16rem)]">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Premium Onboarding Alert -->
        <x-alert />

        <!-- Profile Page Main Header -->
        <div class="mb-10 text-left animate-cinematic">
            <span class="text-[10px] font-black uppercase tracking-widest text-teal-600 block mb-2">MY ACCOUNT</span>
            <h1 class="text-4xl font-black text-navy-800 tracking-tight">Profil Pengguna</h1>
            <p class="text-xs text-sand-500 font-medium mt-1 leading-relaxed">
                Kelola data akun, verifikasi peran aktif Anda, dan tinjau ringkasan saldo keuangan di ekosistem Seapedia.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Left Panel: User Profile Summary (Card Layout) -->
            <div class="lg:col-span-1 space-y-6">
                <div class="card p-6 bg-white border border-sand-300 shadow-warm rounded-[20px] flex flex-col items-center text-center animate-cinematic delay-100">
                    <div class="w-20 h-20 rounded-full bg-gradient-to-br from-teal-400 to-teal-600 text-white flex items-center justify-center font-black text-3xl shadow-warm mb-4">
                        {{ strtoupper(substr($user->name, 0, 2)) }}
                    </div>
                    
                    <h2 class="text-xl font-black text-navy-900 leading-tight">{{ $user->name }}</h2>
                    <p class="text-xs text-sand-500 font-semibold mt-1">@ {{ $user->username }}</p>
                    
                    <div class="w-full border-t border-sand-200/80 my-4"></div>
                    
                    <div class="w-full text-left space-y-3">
                        <div>
                            <h4 class="text-[10px] font-bold text-sand-400 uppercase tracking-wider">Email Utama</h4>
                            <p class="text-xs font-semibold text-navy-800 break-all mt-0.5">{{ $user->email }}</p>
                        </div>
                        <div>
                            <h4 class="text-[10px] font-bold text-sand-400 uppercase tracking-wider">Peran Aktif Saat Ini</h4>
                            <span class="inline-flex items-center text-[10px] font-black uppercase bg-teal-500/10 text-teal-700 border border-teal-200/50 px-2 py-0.5 mt-1 tracking-widest">
                                {{ $activeRole }}
                            </span>
                        </div>
                    </div>

                    @if(count($roles) > 1)
                        <div class="w-full mt-6">
                            <a href="{{ route('select-role') }}" class="btn btn-secondary btn-sm w-full font-black tracking-widest text-[9px] py-3 rounded-[10px]">
                                GANTI PERAN AKTIF
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Right Panel: Buyer financial summary + partnership CTA -->
            <div class="lg:col-span-2 space-y-6">
                
                <!-- Buyer Financial Summary -->
                <div class="card p-6 bg-white border border-sand-300 shadow-warm rounded-[20px] animate-cinematic delay-200">
                    <h3 class="text-xs font-black text-navy-900 uppercase tracking-widest mb-4">Ringkasan Akun Buyer</h3>
                    
                    <div class="space-y-4">
                        <!-- Wallet Balance -->
                        <div class="flex items-center justify-between p-4 rounded-[14px] bg-teal-50/40 border border-teal-100/80">
                            <div class="flex items-center gap-3">
                                <div class="p-2.5 bg-teal-100 text-teal-600 rounded-[10px]">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 12m18 0c0 .621-.504 1.125-1.125 1.125H3.375A1.125 1.125 0 012.25 12m18 0v1.5a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 13.5V12"></path></svg>
                                </div>
                                <div>
                                    <h4 class="text-xs font-black text-navy-950 uppercase tracking-wider">Saldo Wallet</h4>
                                    <p class="text-[10px] text-sand-500 font-semibold">Dompet Digital Belanja</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <span class="text-sm font-black text-navy-900">
                                    Rp {{ number_format($user->wallet ? $user->wallet->balance : 0, 0, ',', '.') }}
                                </span>
                                <p class="text-[10px] text-teal-600 font-semibold mt-0.5">Top-up (Level 3)</p>
                            </div>
                        </div>

                        <!-- Order History Count -->
                        <div class="flex items-center justify-between p-4 rounded-[14px] bg-sand-50/50 border border-sand-200/80">
                            <div class="flex items-center gap-3">
                                <div class="p-2.5 bg-sand-200 text-sand-500 rounded-[10px]">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z"></path></svg>
                                </div>
                                <div>
                                    <h4 class="text-xs font-black text-navy-950 uppercase tracking-wider">Riwayat Pesanan</h4>
                                    <p class="text-[10px] text-sand-500 font-semibold">Semua transaksi pembelian</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <span class="text-sm font-black text-navy-900">
                                    {{ $user->orders ? $user->orders->count() : 0 }} Pesanan
                                </span>
                                <p class="text-[10px] text-sand-400 font-semibold mt-0.5">Lihat (Level 3)</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Partnership CTA – w-fit agar lebar mengikuti konten card sendiri, bukan stretch kolom -->
                @if(!in_array('seller', $roles) || !in_array('driver', $roles))
                    <div class="w-100 animate-cinematic delay-300">
                        <div class="card p-6 bg-gradient-to-br from-navy-900 to-navy-950 text-white rounded-[20px] relative overflow-hidden shadow-warm-lg border border-navy-800">
                            <!-- Background Pattern -->
                            <div class="absolute inset-0 dot-pattern opacity-10 pointer-events-none"></div>
                            
                            <div class="relative z-10 space-y-4">
                                <div class="space-y-2">
                                    <span class="text-[9px] font-black uppercase tracking-widest text-teal-400">PARTNERSHIP OPPORTUNITY</span>
                                    <h3 class="text-xl font-black tracking-tight">Mulai Bisnis Anda<br>di SEAPEDIA.</h3>
                                    <p class="text-xs text-sand-300 leading-relaxed font-medium">
                                        Daftarkan diri sebagai Mitra Penjual atau<br>Kurir untuk membuka fitur eksklusif.
                                    </p>
                                </div>
                                <a href="{{ route('profile.partnership') }}" class="btn btn-primary inline-flex whitespace-nowrap text-xs font-black tracking-widest py-3 px-6 rounded-[10px] shadow-lg">
                                    DAFTAR MITRA SEKARANG
                                </a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="card p-6 bg-teal-500/10 border border-teal-200/50 rounded-[20px] text-center animate-cinematic delay-300">
                        <p class="text-xs font-semibold text-teal-800">
                            Terima kasih! Anda telah terdaftar sebagai Mitra Penjual &amp; Kurir di ekosistem kelautan SEAPEDIA.
                        </p>
                    </div>
                @endif

            </div>

        </div>

    </div>
</section>
@endsection
