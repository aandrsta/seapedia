@extends('layouts.app')

@section('title', 'Dompet Belanja - SEAPEDIA')

@section('content')
<section class="bg-sand-100 py-16 min-h-[calc(100vh-16rem)]">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8" x-data="{ customAmount: '' }">
        
        <!-- Breadcrumb & Header -->
        <div class="mb-8 flex items-center justify-between">
            <a href="{{ route('profile') }}" class="text-xs font-bold text-teal-600 hover:text-teal-500 flex items-center gap-1 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" /></svg>
                Kembali ke Profil
            </a>
        </div>

        <div class="mb-10 text-left animate-cinematic">
            <span class="text-[10px] font-black uppercase tracking-widest text-teal-600 block mb-2">SEAPEDIA WALLET</span>
            <h1 class="text-4xl font-black text-navy-800 tracking-tight">Dompet Belanja</h1>
            <p class="text-xs text-sand-500 font-medium mt-1 leading-relaxed">
                Isi saldo dompet digital belanja Anda dan tinjau riwayat seluruh transaksi pembayaran di ekosistem Seapedia.
            </p>
        </div>

        <!-- Alert Component -->
        <x-alert />

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Left Side: Balance & Top-up Form -->
            <div class="lg:col-span-1 space-y-6">
                <!-- Balance Display Card -->
                <div class="card p-6 bg-gradient-to-br from-teal-600 to-teal-700 text-white border border-teal-500/30 shadow-warm rounded-[20px] relative overflow-hidden animate-cinematic delay-100">
                    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(rgba(255,255,255,0.3) 1px, transparent 1px); background-size: 16px 16px;"></div>
                    <div class="relative z-10">
                        <span class="text-[9px] font-black uppercase tracking-widest text-teal-200">TOTAL SALDO AKTIF</span>
                        <h2 class="text-3xl font-black mt-1 tracking-tight">
                            Rp {{ number_format($wallet->balance, 0, ',', '.') }}
                        </h2>
                        <div class="mt-8 flex items-center gap-2">
                            <span class="w-2.5 h-2.5 bg-teal-300 rounded-full animate-pulse"></span>
                            <span class="text-[10px] text-teal-100 font-bold uppercase tracking-wider">Siap Digunakan Belanja</span>
                        </div>
                    </div>
                </div>

                <!-- Top-up Form Card -->
                <div class="card p-6 bg-white border border-sand-300 shadow-warm rounded-[20px] animate-cinematic delay-200">
                    <h3 class="text-xs font-black text-navy-900 uppercase tracking-widest mb-4">Pengisian Saldo</h3>
                    
                    <form action="{{ route('buyer.wallet.topup') }}" method="POST" class="space-y-4">
                        @csrf
                        
                        <div>
                            <label for="amount" class="label text-sand-400 font-bold uppercase tracking-wider text-[10px]">Nominal (Rp)</label>
                            <input type="number" 
                                   id="amount" 
                                   name="amount" 
                                   x-model.number="customAmount"
                                   class="input @error('amount') input-error @enderror" 
                                   placeholder="Contoh: 100000" 
                                   min="10000" 
                                   max="10000000" 
                                   required>
                            @error('amount')
                                <p class="form-error mt-1.5">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Instant Options -->
                        <div class="grid grid-cols-2 gap-2 pt-2">
                            <button type="button" @click="customAmount = 50000" class="btn btn-ghost border border-sand-300 hover:border-teal-500 hover:text-teal-600 font-bold text-xs rounded-[10px] py-2 px-3 transition-all text-navy-800">
                                + 50.000
                            </button>
                            <button type="button" @click="customAmount = 100000" class="btn btn-ghost border border-sand-300 hover:border-teal-500 hover:text-teal-600 font-bold text-xs rounded-[10px] py-2 px-3 transition-all text-navy-800">
                                + 100.000
                            </button>
                            <button type="button" @click="customAmount = 250000" class="btn btn-ghost border border-sand-300 hover:border-teal-500 hover:text-teal-600 font-bold text-xs rounded-[10px] py-2 px-3 transition-all text-navy-800">
                                + 250.000
                            </button>
                            <button type="button" @click="customAmount = 500000" class="btn btn-ghost border border-sand-300 hover:border-teal-500 hover:text-teal-600 font-bold text-xs rounded-[10px] py-2 px-3 transition-all text-navy-800">
                                + 500.000
                            </button>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg w-full mt-4 font-black tracking-widest text-[10px] rounded-[12px] shadow-md py-4">
                            PROSES TOP-UP SEKARANG
                        </button>
                    </form>
                </div>
            </div>

            <!-- Right Side: Wallet History List -->
            <div class="lg:col-span-2 space-y-6">
                <div class="card p-6 bg-white border border-sand-300 shadow-warm rounded-[20px] animate-cinematic delay-200">
                    <h3 class="text-xs font-black text-navy-900 uppercase tracking-widest mb-4">Riwayat Transaksi Dompet</h3>
                    
                    @if($transactions->isEmpty())
                        <div class="text-center py-16 text-sand-400 font-semibold italic text-xs">
                            Belum ada riwayat transaksi dompet digital Anda.
                        </div>
                    @else
                        <x-table>
                            <x-slot:thead>
                                <th class="text-[10px] font-bold text-navy-600 uppercase tracking-wider px-4 py-3.5">Tanggal &amp; Waktu</th>
                                <th class="text-[10px] font-bold text-navy-600 uppercase tracking-wider px-4 py-3.5">Detail</th>
                                <th class="text-[10px] font-bold text-navy-600 uppercase tracking-wider px-4 py-3.5 text-right">Nominal</th>
                            </x-slot:thead>

                            <x-slot:tbody>
                                @foreach($transactions as $transaction)
                                    <tr class="hover:bg-sand-50/30 transition-colors">
                                        <td class="px-4 py-4 text-xs font-semibold text-sand-600">
                                            {{ $transaction->created_at->format('d M Y · H:i') }}
                                        </td>
                                        <td class="px-4 py-4">
                                            <!-- Transaction Type Badge -->
                                            <div class="flex items-center gap-2">
                                                @if($transaction->type === 'topup')
                                                    <span class="inline-flex items-center text-[9px] font-black uppercase bg-emerald-500/10 text-emerald-700 border border-emerald-200/50 px-1.5 py-0.5 rounded tracking-wide shrink-0">TOP UP</span>
                                                @elseif($transaction->type === 'payment')
                                                    <span class="inline-flex items-center text-[9px] font-black uppercase bg-navy-500/10 text-navy-700 border border-navy-200/50 px-1.5 py-0.5 rounded tracking-wide shrink-0">PAYMENT</span>
                                                @elseif($transaction->type === 'refund')
                                                    <span class="inline-flex items-center text-[9px] font-black uppercase bg-teal-500/10 text-teal-700 border border-teal-200/50 px-1.5 py-0.5 rounded tracking-wide shrink-0">REFUND</span>
                                                @endif
                                                <span class="text-xs text-navy-900 font-bold leading-tight">{{ $transaction->description }}</span>
                                            </div>
                                        </td>
                                        <td class="px-4 py-4 text-xs font-black text-right shrink-0">
                                            <span class="{{ $transaction->type === 'topup' || $transaction->type === 'refund' ? 'text-emerald-600' : 'text-coral-500' }}">
                                                {{ $transaction->type === 'topup' || $transaction->type === 'refund' ? '+' : '-' }}
                                                Rp {{ number_format($transaction->amount, 0, ',', '.') }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </x-slot:tbody>
                        </x-table>

                        <!-- Pagination -->
                        <div class="mt-6">
                            {{ $transactions->links() }}
                        </div>
                    @endif
                </div>
            </div>

        </div>

    </div>
</section>
@endsection
