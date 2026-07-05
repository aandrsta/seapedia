<?php

namespace App\Http\Controllers\Api\Seller;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    protected function getStore(Request $request)
    {
        $store = $request->user()->store;
        if (!$store) {
            return response()->json(['message' => 'Anda harus mendaftarkan toko terlebih dahulu.'], 403);
        }
        return $store;
    }

    public function index(Request $request)
    {
        $store = $this->getStore($request);
        if ($store instanceof \Illuminate\Http\JsonResponse) {
            return $store;
        }

        $products = $store->products()->latest()->get();
        return response()->json($products, 200);
    }

    public function store(Request $request)
    {
        $store = $this->getStore($request);
        if ($store instanceof \Illuminate\Http\JsonResponse) {
            return $store;
        }

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'image_url' => ['nullable', 'url', 'max:255'],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $product = $store->products()->create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image_url' => $request->image_url,
        ]);

        return response()->json([
            'message' => 'Produk berhasil ditambahkan.',
            'product' => $product
        ], 210); // Or 201
    }

    public function show(Request $request, $id)
    {
        $store = $this->getStore($request);
        if ($store instanceof \Illuminate\Http\JsonResponse) {
            return $store;
        }

        $product = Product::findOrFail($id);
        if ($product->store_id !== $store->id) {
            return response()->json(['message' => 'Unauthorized.'], 403);
        }

        return response()->json($product, 200);
    }

    public function update(Request $request, $id)
    {
        $store = $this->getStore($request);
        if ($store instanceof \Illuminate\Http\JsonResponse) {
            return $store;
        }

        $product = Product::findOrFail($id);
        if ($product->store_id !== $store->id) {
            return response()->json(['message' => 'Unauthorized.'], 403);
        }

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'image_url' => ['nullable', 'url', 'max:255'],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image_url' => $request->image_url,
        ]);

        return response()->json([
            'message' => 'Produk berhasil diperbarui.',
            'product' => $product
        ], 200);
    }

    public function destroy(Request $request, $id)
    {
        $store = $this->getStore($request);
        if ($store instanceof \Illuminate\Http\JsonResponse) {
            return $store;
        }

        $product = Product::findOrFail($id);
        if ($product->store_id !== $store->id) {
            return response()->json(['message' => 'Unauthorized.'], 403);
        }

        $product->delete();

        return response()->json([
            'message' => 'Produk berhasil dihapus.'
        ], 200);
    }
}
