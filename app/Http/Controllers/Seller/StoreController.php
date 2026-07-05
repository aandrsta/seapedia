<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StoreController extends Controller
{
    public function create()
    {
        if (auth()->user()->store()->exists()) {
            return redirect()->route('dashboard.seller')->with('info', 'Anda sudah memiliki toko.');
        }

        return view('dashboard.seller.store.create');
    }

    public function store(Request $request)
    {
        if (auth()->user()->store()->exists()) {
            return redirect()->route('dashboard.seller')->with('info', 'Anda sudah memiliki toko.');
        }

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255', 'unique:stores,name'],
            'description' => ['nullable', 'string', 'max:1000'],
        ], [
            'name.required' => 'Nama toko wajib diisi.',
            'name.unique' => 'Nama toko sudah digunakan oleh penjual lain.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Store::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('dashboard.seller')->with('success', 'Toko Anda berhasil dibuat! Selamat berjualan.');
    }

    public function edit()
    {
        $store = auth()->user()->store;
        if (!$store) {
            return redirect()->route('seller.store.create')->with('info', 'Silakan buat toko terlebih dahulu.');
        }

        return view('dashboard.seller.store.edit', compact('store'));
    }

    public function update(Request $request)
    {
        $store = auth()->user()->store;
        if (!$store) {
            return redirect()->route('seller.store.create')->with('info', 'Silakan buat toko terlebih dahulu.');
        }

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255', 'unique:stores,name,' . $store->id],
            'description' => ['nullable', 'string', 'max:1000'],
        ], [
            'name.required' => 'Nama toko wajib diisi.',
            'name.unique' => 'Nama toko sudah digunakan oleh penjual lain.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $store->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('dashboard.seller')->with('success', 'Profil toko berhasil diperbarui.');
    }
}
