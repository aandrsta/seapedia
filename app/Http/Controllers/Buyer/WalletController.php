<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\WalletTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WalletController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        // Memastikan wallet sudah ada (lazy initialization jika belum terbuat di RegisterController)
        $wallet = $user->wallet ?: $user->wallet()->create(['balance' => 0.00]);
        
        // Mengambil riwayat transaksi diurutkan dari yang terbaru
        $transactions = $wallet->transactions()->latest()->paginate(10);

        return view('buyer.wallet.index', compact('wallet', 'transactions'));
    }

    public function topup(Request $request)
    {
        $request->validate([
            'amount' => ['required', 'integer', 'min:10000', 'max:10000000'],
        ], [
            'amount.required' => 'Nominal top-up wajib diisi.',
            'amount.integer' => 'Nominal top-up harus berupa angka.',
            'amount.min' => 'Minimal top-up adalah Rp 10.000.',
            'amount.max' => 'Maksimal top-up sekali transaksi adalah Rp 10.000.000.',
        ]);

        $user = auth()->user();
        $wallet = $user->wallet;

        if (!$wallet) {
            $wallet = $user->wallet()->create(['balance' => 0.00]);
        }

        DB::transaction(function () use ($wallet, $request) {
            // Menambah saldo dompet
            $wallet->increment('balance', $request->amount);

            // Mencatat riwayat transaksi wallet
            WalletTransaction::create([
                'wallet_id' => $wallet->id,
                'type' => 'topup',
                'amount' => $request->amount,
                'description' => 'Top-up saldo dompet digital belanja',
            ]);
        });

        return redirect()->route('buyer.wallet')->with('success', 'Top-up saldo sebesar Rp ' . number_format($request->amount, 0, ',', '.') . ' berhasil dilakukan!');
    }
}
