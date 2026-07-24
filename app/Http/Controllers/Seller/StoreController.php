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
            'logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
            'description' => ['nullable', 'string', 'max:1000'],
        ], [
            'name.required' => 'Nama toko wajib diisi.',
            'name.unique' => 'Nama toko sudah digunakan oleh penjual lain.',
            'logo.image' => 'File logo toko harus berupa gambar.',
            'logo.mimes' => 'Format logo toko harus jpeg, png, jpg, gif, atau webp.',
            'logo.max' => 'Ukuran logo toko maksimal 2MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('stores', 'public');
        }

        Store::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'logo' => $logoPath,
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
            'logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
            'description' => ['nullable', 'string', 'max:1000'],
        ], [
            'name.required' => 'Nama toko wajib diisi.',
            'name.unique' => 'Nama toko sudah digunakan oleh penjual lain.',
            'logo.image' => 'File logo toko harus berupa gambar.',
            'logo.mimes' => 'Format logo toko harus jpeg, png, jpg, gif, atau webp.',
            'logo.max' => 'Ukuran logo toko maksimal 2MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        if ($request->hasFile('logo')) {
            if ($store->logo && \Illuminate\Support\Facades\Storage::disk('public')->exists($store->logo)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($store->logo);
            }
            $data['logo'] = $request->file('logo')->store('stores', 'public');
        }

        $store->update($data);

        return redirect()->route('dashboard.seller')->with('success', 'Profil toko berhasil diperbarui.');
    }
}
