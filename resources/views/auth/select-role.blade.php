@extends('layouts.guest')

@section('title', 'Pilih Peran Akun - SEAPEDIA')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="space-y-2">
        <h2 class="text-3xl font-black text-white tracking-tight leading-none">Pilih Peran Sesi</h2>
        <p class="text-sand-100 text-sm">Pilih salah satu peran aktif Anda untuk memulai sesi ini.</p>
    </div>

    <!-- Selection Form -->
    <form action="{{ route('select-role.store') }}" method="POST" class="space-y-4">
        @csrf

        <div class="flex flex-col gap-3">
            @foreach($roles as $role)
                <label class="group relative flex items-start p-4 rounded-[10px] border border-sand-300 bg-white hover:border-teal-500 cursor-pointer select-none transition-all">
                    <div class="flex-shrink-0 mt-1">
                        <input type="radio" name="role" value="{{ $role }}" class="h-4.5 w-4.5 text-teal-500 border-sand-300 focus:ring-teal-500/20" required>
                    </div>
                    <div class="ml-3 flex flex-col">
                        <span class="text-xs font-black text-navy-900 uppercase tracking-widest mb-0.5 group-hover:text-teal-600 transition-colors">
                            @if($role === 'admin')
                                Administrator
                            @elseif($role === 'buyer')
                                Buyer
                            @elseif($role === 'seller')
                                Seller
                            @elseif($role === 'driver')
                                Driver
                            @endif
                        </span>
                        <span class="text-[11px] text-sand-500 font-medium leading-relaxed">
                            @if($role === 'admin')
                                Memantau aktivitas transaksi, voucher, dan laporan operasional.
                            @elseif($role === 'buyer')
                                Belanja produk pilihan, isi saldo wallet, dan pantau pengiriman.
                            @elseif($role === 'seller')
                                Buka toko baru, kelola produk jualan, dan proses orderan masuk.
                            @elseif($role === 'driver')
                                Terima pesanan antar, kirim paket pembeli, dan dapatkan komisi.
                            @endif
                        </span>
                    </div>
                </label>
            @endforeach
        </div>

        <button type="submit" class="btn btn-light btn-lg w-full mt-4 font-black tracking-widest text-white shadow-md">
            Lanjutkan Sesi
        </button>
    </form>
</div>
@endsection
