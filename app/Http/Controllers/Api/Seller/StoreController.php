<?php

namespace App\Http\Controllers\Api\Seller;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StoreController extends Controller
{
    public function show(Request $request)
    {
        $store = $request->user()->store;
        if (!$store) {
            return response()->json(['message' => 'Toko belum terdaftar.'], 444); // Or 404
        }

        return response()->json($store, 200);
    }

    public function store(Request $request)
    {
        if ($request->user()->store()->exists()) {
            return response()->json(['message' => 'Anda sudah memiliki toko.'], 400);
        }

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255', 'unique:stores,name'],
            'description' => ['nullable', 'string', 'max:1000'],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $store = Store::create([
            'user_id' => $request->user()->id,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return response()->json([
            'message' => 'Toko berhasil dibuat.',
            'store' => $store
        ], 210); // Or 201
    }

    public function update(Request $request)
    {
        $store = $request->user()->store;
        if (!$store) {
            return response()->json(['message' => 'Toko belum terdaftar.'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255', 'unique:stores,name,' . $store->id],
            'description' => ['nullable', 'string', 'max:1000'],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $store->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return response()->json([
            'message' => 'Profil toko berhasil diperbarui.',
            'store' => $store
        ], 200);
    }

    public function getStorePublic($id)
    {
        $store = Store::with('products')->findOrFail($id);
        return response()->json($store, 200);
    }
}
